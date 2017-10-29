<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/27/17
 * Time: 8:29 PM
 */

session_start() ;

if (!ini_get('safe_mode')) {
    set_time_limit(600);
}

ini_set('memory_limit', '512M');

class AppInstaller {
    //public $installDir;
    public $currentDir;
    public $composerHomeDir;
    public $composerFilename;
    public $composerPath;
    //public $appDir = 'app';
    public $phpPath;

    public $databaseSettings = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'finance-database.sqlite',
        'driver' => 'Cake\Database\Driver\Sqlite'
    ];


    const DATASOURCE_REGEX = "/(\'Datasources'\s\=\>\s\[\n\s*\'default\'\s\=\>\s\[\n\X*\'__FIELD__\'\s\=\>\s\').*(\'\,)(?=\X*\'test\'\s\=\>\s)/";
    const REQUIREMENTS_DELAY = 500000;
    const DIR_MODE = 0777;
    const VERSIONS_SESSION_KEY = 'cached_versions';
    //const MIXER_PACKAGE = 'CakeDC/Mixer';
    //const MIXER_VERSION = '@stable';

    public function __construct()
    {
        $this->currentDir = __DIR__ . DIRECTORY_SEPARATOR;

        $this->phpPath = dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'php ';


        $this->composerHomeDir = $this->currentDir . '.composer';
        $this->composerFilename = 'composer.phar';
        //if (!$this->composerPath = $this->_getComposerPathFromQuery()) {
            $this->composerPath = $this->currentDir . $this->composerFilename;
        //}

        $this->installDir = $this->currentDir;

    }

    public function run()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            $action = '_run' . ucfirst($_POST['action']);
            if (method_exists($this, $action)) {
                header('Content-Type: application/json');
                $result = $this->$action() + ['success' => 1];
                echo json_encode($result);

                exit(0);
            }
        }
    }


    protected function _runCheckPhp()
    {
        usleep(self::REQUIREMENTS_DELAY);
        if (!version_compare(PHP_VERSION, '5.5.9', '>=')) {
            throw new Exception('Your version of PHP is too low. You need PHP 5.5.9 or higher (detected ' . PHP_VERSION . ').');
        }

        return ['message' => 'Your version of PHP is 5.5.9 or higher (detected ' . PHP_VERSION . ').'];
    }

    protected function _runCheckMbString()
    {
        usleep(self::REQUIREMENTS_DELAY);
        if (!extension_loaded('mbstring')) {
            throw new Exception('Your version of PHP does NOT have the mbstring extension loaded.');
        }

        return ['message' => 'Your version of PHP has the mbstring extension loaded.'];
    }

    protected function _runCheckOpenSSL()
    {
        usleep(self::REQUIREMENTS_DELAY);
        if (extension_loaded('openssl')) {
            return ['message' => 'Your version of PHP has the openssl extension loaded.'];
        } elseif (extension_loaded('mcrypt')) {
            return ['message' => 'Your version of PHP has the mcrypt extension loaded.'];
        }

        throw new Exception('Your version of PHP does NOT have the openssl or mcrypt extension loaded.');
    }

    protected function _runCheckIntl()
    {
        usleep(self::REQUIREMENTS_DELAY);
        if (!extension_loaded('intl')) {
            throw new Exception('Your version of PHP does NOT have the intl extension loaded.');
        }

        return ['message' => 'Your version of PHP has the intl extension loaded.'];
    }

    protected function _runCheckPath()
    {
        usleep(self::REQUIREMENTS_DELAY);

        $this->_checkPath($this->installDir);

        return ['message' => $this->installDir . ' directory is writable'];
    }

    protected function _checkPath($path)
    {
        if (file_exists($path)) {
            if (!is_dir($path)) {
                throw new Exception("{$path} is not a directory");
            }

            if (!is_writable($path)) {
                throw new Exception("{$path} directory is NOT writable");
            }
        } elseif (!is_writable(dirname($path))) {
            throw new Exception(dirname($path) . ' directory is NOT writable');
        }
    }


    protected function _updateDatasourceConfig($path, $field, $value)
    {
        $config = file_get_contents($path);
        $config = preg_replace(str_replace('__FIELD__', $field, AppInstaller::DATASOURCE_REGEX), '${1}' . $value . '${2}', $config);

        return file_put_contents($path, $config);
    }

    protected function _runInstallComposer()
    {
        $result = [];
        if (!is_readable($this->composerPath) || !($version = $this->_getComposerVersion())) {
            $result['log'] = $this->_installComposer($this->currentDir, $this->composerFilename);
            $version = $this->_getComposerVersion();
        } else {
            usleep(self::REQUIREMENTS_DELAY);
            $result['log'] = $version;
        }

        if (strpos($version, 'Composer') === false && strpos($version, 'version') === false) {
            throw new Exception('Invalid composer installation');
        }

        $result['message'] = $version;

        return $result;
    }


    protected function _installComposer($dir, $filename)
    {
        putenv("COMPOSER_HOME={$this->composerHomeDir}");
        putenv("OSTYPE=OS400");

        $composerSetupFilename = 'composer-setup.php';
        copy('https://getcomposer.org/installer', $composerSetupFilename);

        $expectedSignature = trim(file_get_contents('https://composer.github.io/installer.sig'));
        if (!hash_file('SHA384', $composerSetupFilename) === $expectedSignature) {
            unlink($composerSetupFilename);
            throw new Exception('Composer Installer corrupt');
        }

        // Modify composer setup script not to exit
        $composerSetup = file_get_contents('https://getcomposer.org/installer');
        $composerSetup = str_replace('exit(0);', 'return;', $composerSetup);
        $composerSetup = str_replace('exit(1);', 'throw new Exception("Error setting up composer");', $composerSetup);
        $composerSetup = str_replace('exit($ok ? 0 : 1);', 'if ($ok) return; else throw new Exception("Error setting up composer");', $composerSetup);
        file_put_contents($composerSetupFilename, $composerSetup);

        ob_start();
        ini_set('register_argc_argv', 0);
        $argv = [
            "--install-dir={$dir}",
            "--filename={$filename}",
        ];
        require($composerSetupFilename);
        $result = ob_get_clean();

        unlink($composerSetupFilename);

        if (strpos($result, 'successfully installed to: ' . $dir . $filename) === false) {
            throw new Exception('Error while installing composer');
        }

        return $result;
    }




    protected  function _getComposerVersion()
    {
        return $this->_runComposer([
            '--version' => true,
        ]);
    }

    protected function _runComposer($input)
    {
        putenv("OSTYPE=OS400");
        if (!getenv('COMPOSER_HOME')) {
            putenv("COMPOSER_HOME={$this->composerHomeDir}");
        }

        if (substr($this->composerPath, -5) == '.phar') {
            require_once "phar://{$this->composerPath}/src/bootstrap.php";

            $input = new \Symfony\Component\Console\Input\ArrayInput($input);
            $output = new \Symfony\Component\Console\Output\BufferedOutput();

            $application = new \Composer\Console\Application();
            $application->setAutoExit(false);
            $application->run($input, $output);

            return $output->fetch();
        } else {
            $command = $this->_buildComposerCommand($this->composerPath, $input);

            ob_start();
            // Todo: add the path to php here
            passthru($command);

            return ob_get_clean();
        }
    }

    protected function _buildComposerCommand($path, $input)
    {
        $command = [escapeshellcmd($path)];

        foreach ($input as $k => $v) {
            if (substr($k, 0, 2) == '--') {
                $command[] = escapeshellcmd($k . ($v === true ? '' : "={$v}"));
            } elseif (is_array($v)) {
                $command[] = escapeshellcmd(implode(' ', $v));
            } else {
                $command[] = escapeshellcmd($v);
            }
        }

        return implode(' ', $command);
    }


    protected function _runInstallProject()
    {
        $log = $this->_installProject();
        return [
            'message' => 'CakePHP project created',
            'log' => $log,
            //'steps' => $steps
        ];
    }


    protected function _installProject($install = true)
    {

        $input = [
            'command' => 'install',
            '--no-interaction' => true,
            //'--prefer-dist' => true,
            //'package' => $package,
            //'directory' => $tmpDir ? $tmpDir : $dir,
        ];

        if (!$install) {
            $input += [
                '--no-install' => true,
                '--no-scripts' => true,
            ];
        }

        $output = $this->_runComposer($input);



        return $output;
    }

    protected function _runFinalise()
    {
        //$this->_checkPath($this->installDir);
        //$this->_restoreScripts();

        $log = $this->_runComposer([
            'command' => 'dump-autoload -o',
            '--no-interaction' => true,
            //'--working-dir' => $this->installDir,
        ]);

        $log .= "\n";

        $log .= $this->_runComposer([
            'command' => 'run-script',
            'script' => 'post-install-cmd',
            '--no-interaction' => true,
            //'--working-dir' => $this->installDir,
        ]);

        // copy the contents of settings.json and replace it with the one in the main app
        /*$mainSettingsFile = file_get_contents('settings.json');

        $appSettings = '../settings.json';
        file_put_contents($appSettings,$mainSettingsFile);*/


        $message = 'Finalised!';

        return compact('log', 'message');
    }
}

try {
    $installer = new AppInstaller();
    $installer->run();

} catch ( Exception $e ) {
    echo json_encode([
        'success' => 0,
        'message' => htmlentities($e->getMessage())
    ]);

    exit(0);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Application Installer </title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="webroot/assets/plugins/bootstrap/css/bootstrap.min.css" >

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Fonts -->
        <link rel="stylesheet" href="webroot/assets/plugins/font-awesome/css/font-awesome.min.css">

        <style>
            .checklist {
                list-style-type: none;
                padding-left: 28px;
            }

            .checklist i.fa {
                margin-right: 3px;
            }

            .checklist span.text-danger {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">

        </div>
        <div class="col-sm-12">
            <div class="jumbotron text-center">
                <p class="text-danger"> <i class="fa fa-warning"> </i> Please make sure you are connected to the internet before running this process.  </p>
                <p> Please your system needs to be connected to the internet for this process to work</p>

                <button id="start" class="btn btn-primary btn-lg" > Click To Install </button>
            </div>
        </div>
        <div id="installation" class="row" style="display:none">
            <div class="col-md-12">

                <h2>1. Requirements</h2>
                <ul class="checklist requirements-list list"></ul>

                <div id="composer-list-wrapper" style="display: none">
                    <h2>2. Composer</h2>
                    <ul class="checklist composer-list list"></ul>
                </div>

                <div id="cake-list-wrapper" style="display: none">
                    <h2>3. Application Setup</h2>
                    <ul class="checklist cake-list list"></ul>
                </div>

                <div class="on-finish" style="padding-left: 28px; display: none">
                    <p class="congrats">Congratulations!</p>
                    <p>You just completed your installation </p>
                </div>
            </div>

        </div>
    </div>

    </body>
    <script src="webroot/assets/plugins/jquery/jquery-3.2.1.js"></script>
    <script src="webroot/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>

        // AjaxQ jQuery Plugin
        // Copyright (c) 2012 Foliotek Inc.
        // MIT License
        // https://github.com/Foliotek/ajaxq
        // Uses CommonJS, AMD or browser globals to create a jQuery plugin.
        !function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof module&&module.exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){var b={},c={};a.ajaxq=function(d,e){function j(a){if(b[d])b[d].push(a);else{b[d]=[];var e=a();c[d]=e}}function k(){if(b[d]){var a=b[d].shift();if(a){var e=a();c[d]=e}else delete b[d],delete c[d]}}if("undefined"==typeof e)throw"AjaxQ: queue name is not provided";var f=a.Deferred(),g=f.promise();g.success=g.done,g.error=g.fail,g.complete=g.always;var h="function"==typeof e,i=h?null:a.extend(!0,{},e);return j(function(){var b=a.ajax.apply(window,[h?e():i]);return b.done(function(){f.resolve.apply(this,arguments)}),b.fail(function(){f.reject.apply(this,arguments)}),b.always(k),b}),g},a.each(["getq","postq"],function(b,c){a[c]=function(b,d,e,f,g){return a.isFunction(e)&&(g=g||f,f=e,e=void 0),a.ajaxq(b,{type:"postq"===c?"post":"get",url:d,data:e,success:f,dataType:g})}});var d=function(a){return b.hasOwnProperty(a)&&b[a].length>0||c.hasOwnProperty(a)},e=function(){for(var a in b)if(d(a))return!0;return!1};a.ajaxq.isRunning=function(a){return a?d(a):e()},a.ajaxq.getActiveRequest=function(a){if(!a)throw"AjaxQ: queue name is required";return c[a]},a.ajaxq.abort=function(d){if(!d)throw"AjaxQ: queue name is required";var e=a.ajaxq.getActiveRequest(d);delete b[d],delete c[d],e&&e.abort()},a.ajaxq.clear=function(a){if(a)b[a]&&(b[a]=[]);else for(var c in b)b.hasOwnProperty(c)&&(b[c]=[])}});




        $(function() {

            $('#start').on('click', function(e) {
                e.preventDefault();

                //$('#start').addClass('rotate');
                setTimeout(function(){
                    //$('#splash').hide();
                    $('#installation').show();

                    var $requirementsList = $('.requirements-list');
                    var $composerList = $('.composer-list');
                    var $cakeList = $('.cake-list');
                    //var appDir = $('#app_dir').val();
                    //var currentDir = $('#current_dir').text();

                    //$('#go_to_your_app').attr('href', appDir);
                    //$('#go_to_mixer').attr('href', appDir + '/mixer');
                    //$('#install_dir').text(currentDir + appDir);

                    runRequirementsSteps($requirementsList, $composerList, $cakeList );
                }, 1000);

                return false;
            });
        });

        function runRequirementsSteps($list, $composerList, $cakeList, dir) {
            runSteps(
                'requirements',
                [
                    /*{
                        title: 'Checking path...',
                        data: { action: 'checkPath', dir: dir }
                    },*/
                    {
                        title: 'Checking PHP version...',
                        data: { action: 'checkPhp' }
                    },
                    {
                        title: 'Checking mbstring extension...',
                        data: { action: 'checkMbString' }
                    },
                    {
                        title: 'Checking openssl/mcrypt extension...',
                        data: { action: 'checkOpenSSL' }
                    },
                    {
                        title: 'Checking intl extension...',
                        data: { action: 'checkIntl' },
                        success: function(response) {
                            //$('#progress').attr('class', '').addClass('progress-2');
                            runComposerSteps($composerList, $cakeList, dir);
                        }
                    }
                ],
                $list
            );
        }

        function runComposerSteps($list, $cakeList, dir) {
            $('#composer-list-wrapper').show();

            var title = 'Installing composer...';
            var data = { action: 'installComposer' };

            var composerPath = null;
            if ($('input:checked[name="install_composer"]').val() == 0) {
                composerPath = $('#composer_path').val();
                title = 'Checking composer installation...';
                data.composerPath = composerPath;
            }

            runSteps(
                'composer',
                [
                    {
                        title: title,
                        data: data,
                        success: function(response) {
                            //$('#progress').attr('class', '').addClass('progress-3');
                            runInstallProject($cakeList, dir, composerPath);
                        }
                    }
                ],
                $list
            );
        }


        function runInstallProject($list, dir, composerPath) {
            $('#cake-list-wrapper').show();
            runSteps(
                'cake',
                [
                    {
                        title: 'Creating CakePHP project...',
                        data: {
                            action: 'installProject',
                            /*dir: dir,
                            composerPath: composerPath,
                            version: $('select[name="version"]').val(),
                            stability: $('select[name="stability"]').val(),
                            installMixer: $('input[name="install_mixer"]').is(':checked') ? 1 : 0*/
                        },
                        success: function(response) {
                            //var steps = response.steps;
                            var steps = [
                                {
                                title: 'Finalising...',
                                data: {
                                    action: 'finalise',
                                    /*dir: dir,
                                    composerPath: composerPath,
                                    host: $('input[name="host"]').val(),
                                    username: $('input[name="username"]').val(),
                                    password: $('input[name="password"]').val(),
                                    database: $('input[name="database"]').val(),
                                    installMixer: $('input[name="install_mixer"]').is(':checked') ? 1 : 0*/
                                }
                            }];
                            runSteps('deps',steps, $list);
                        },
                        failure: function(response) {
                            if (response.message && response.message.indexOf('installed')) {
                                $('li:last i', $list).removeClass('fa-times fa-fw text-danger').addClass('fa-check fa-fw text-success');
                                $('li:last span', $list).removeClass('text-danger');
                                //$('#progress').attr('class', '').addClass('progress-9');
                                setTimeout(function(){
                                    /*if (!$('input[name="install_mixer"]').is(':checked')) {
                                        $('#go_to_mixer').removeClass('on-finish');
                                    }*/
                                    $('.on-finish').fadeIn('slow');
                                    //$('#progress').addClass('finished');
                                }, 2000);
                            }
                        }
                    }
                ],
                $list
            );
        }


        function runSteps(queue, steps, $list) {
            steps.forEach(function (step, index) {
                var $listItem = $('<li></li>');
                var $icon = $('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                var $message = $('<span>' + step.title + '</span>');

                $.ajaxq(queue, {
                    url: 'installer.php',
                    dataType: 'json',
                    cache: false,
                    method: 'post',
                    data: step.data,
                    beforeSend: function (jqXHR, settings) {
                        $listItem
                            .append($icon)
                            .append($message)
                            .appendTo($list);

                        if (step.beforeSend) {
                            step.beforeSend(jqXHR, settings);
                        }
                    },
                    complete: function (response) {
                        if (response.status === 200 && response.responseJSON && response.responseJSON.success === 1) {
                            $icon
                                .removeClass('fa-spin fa-fw fa-spinner')
                                .addClass('fa-check fa-fw text-success');

                            $message.text(response.responseJSON.message);

                            if (step.success) {
                                step.success(response.responseJSON);
                            }

                            if (queue == 'deps') {
                                var $progress = $('#progress');

                                var p = Math.round((6 / steps.length) * (index + 1));
                                p = Math.min(p + 3, 9);
                                $progress.attr('class', '').addClass('progress-' + p);

                                if ((index + 1) === steps.length) {
                                    // Finished
                                    $progress.attr('class', '').addClass('progress-9');
                                    setTimeout(function(){
                                        if (!$('input[name="install_mixer"]').is(':checked')) {
                                            $('#go_to_mixer').removeClass('on-finish');
                                        }
                                        $('.on-finish').fadeIn('slow');
                                        $('#progress').addClass('finished');
                                    }, 2000);
                                }
                            }
                        } else {
                            $icon
                                .removeClass('fa-spin fa-fw fa-spinner')
                                .addClass('fa-times fa-fw text-danger');

                            $message.text(response.responseJSON.message ? response.responseJSON.message : 'Unknown error').addClass('text-danger');

                            $.ajaxq.abort(queue);

                            if (step.failure) {
                                step.failure(response.responseJSON);
                            }
                        }

                        if (response.responseJSON) {
                            var log;
                            if (response.responseJSON.log) {
                                log = response.responseJSON.log
                            } else if (response.responseJSON.message) {
                                log = response.responseJSON.message;
                            }

                            if (log != null) {
                                var $log = $('#log');
                                $log.append(step.title + "\n" + log + "\n").scrollTop($log[0].scrollHeight);
                            }
                        }
                    }
                });
            });
        }


    </script>
</html>
