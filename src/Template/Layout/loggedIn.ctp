<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
use Settings\Core\Setting;
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title> Finance Manager </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <?= $this->Site->css('jquery-ui/themes/base/minified/jquery-ui.min.css','plugin') ?>
    <?= $this->Site->css('bootstrap/css/bootstrap.min.css','plugin') ?>
    <?= $this->Site->css('font-awesome/css/font-awesome.min.css','plugin') ?>
    <?= $this->Site->css('css/animate.min.css','assets') ?>
    <?= $this->Site->css('css/style.css','assets') ?>
    <?= $this->Site->css('css/style-responsive.min.css','assets') ?>
    <?= $this->Site->css('css/theme/default.css','assets') ?>
    <?= $this->Site->css('sweetalert/css/sweetalert.css','plugin') ?>

    <?php
    echo $this->Site->css('bootstrap-datepicker/css/bootstrap-datepicker.css','plugin');
    echo $this->Site->css('select2/dist/css/select2.min.css','plugin');
    echo $this->Site->css('switchery/switchery.min.css','plugin');
    ?>

    <?= $this->fetch('topCss') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?= $this->Site->script('jquery/jquery-1.9.1.min.js','plugin') ?>
    <?= $this->Site->script('jquery/jquery-migrate-1.1.0.min.js','plugin') ?>
    <?= $this->Site->script('sweetalert/js/sweetalert.min.js','plugin') ?>
    <?= $this->fetch('topScripts') ?>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<!--<div id="page-loader" class=""><span class="spinner"></span></div> -->
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <?= $this->element('loggedInHeader') ?>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <?= $this->element('sidebar') ?>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <?php
        /*
        $controller = $this->request->getParam('controller');
        $this->Breadcrumbs->add(ucfirst($controller), '/'.$controller);
        $action = $this->request->getParam('action');
        $this->Breadcrumbs->add(ucfirst($action), ['controller' =>ucfirst($controller), 'action' => $action ]);
        echo $this->Breadcrumbs->render(
            ['class' => 'breadcrumbs pull-right'],
            ['separator' => '/']
        );
        echo $this->Html->getCrumbs(' / ', 'Home');*/
         ?>

        <!--<ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header"> Finance Manager <small> manage your income and expenses in one place </small></h1>
        <!-- end page-header -->
        <?=  $this->Flash->render() ?>
        <?= $this->element('get_student') ?>
        <?= $this->fetch('content') ?>
    </div>
    <!-- end #content -->
    <div class="footer">
        <p class="pull-right"><?= Configure::read('Application.Name') ?> version <?= Configure::read('Application.Version') ?> Powered by <a class="text-orange" target="_blank" href="http://www.upsitech.com" title="Visit upsitech" data-toggle='tooltip' trigger="focus" ><?= Configure::read('Application.Company') ?></a> All copyright reserved. &copy;</p>
    </div>


    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<?= $this->Site->script('jquery-ui/ui/minified/jquery-ui.min.js','plugin') ?>
<?= $this->Site->script('bootstrap/js/bootstrap.min.js','plugin') ?>
<!--[if lt IE 9]>
<?= $this->Site->script('crossbrowserjs/html5shiv.js','assets') ?>
<?= $this->Site->script('crossbrowserjs/respond.min.js','assets') ?>
<?= $this->Site->script('crossbrowserjs/excanvas.min.js','assets') ?>
<![endif]-->
<?= $this->Site->script('slimscroll/jquery.slimscroll.min.js','plugin') ?>
<?php
echo $this->Site->script('DataTables/media/js/jquery.dataTables.js','plugin');
echo $this->Site->script('DataTables/media/js/dataTables.bootstrap.min.js','plugin');
echo $this->Site->script('DataTables/extensions/Responsive/js/dataTables.responsive.min.js','plugin');
echo $this->Site->script('select2/dist/js/select2.full.min.js','plugin');
echo $this->Site->script('switchery/switchery.min.js','plugin');
echo $this->Site->script('bootstrap-datepicker/js/bootstrap-datepicker.js','plugin');
?>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?= $this->fetch('bottomScripts') ?>
<?php /* $this->Site->script('js/dashboard.js','assets')*/ ?>
<?= $this->Site->script('js/apps.js','assets') ?>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        $('select').select2();
        $("#multiple-select2").select2({ placeholder: "Select a student" });
    });
</script>
</body>
</html>
