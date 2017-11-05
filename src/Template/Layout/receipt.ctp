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
    <?= $this->Site->css('css/style.min.css','assets') ?>
    <?= $this->Site->css('css/style-responsive.min.css','assets') ?>
    <?= $this->Site->css('css/theme/default.css','assets') ?>
    <?= $this->fetch('topCss') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?= $this->Site->script('jquery/jquery-1.9.1.min.js','plugin') ?>
    <?= $this->Site->script('jquery/jquery-migrate-1.1.0.min.js','plugin') ?>
    <?= $this->Html->css('print.css') ?>
    <?= $this->fetch('topScripts') ?>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<!--<div id="page-loader" class=""><span class="spinner"></span></div> -->
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="page-sidebar-fixed page-header-fixed">

    <!-- begin #content -->
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
    <!-- end #content -->
</div>
<!-- end page container -->

</body>
<script>
    $(document).ready(function() {
       // get the student copy and append to school copy
        var studentCopy = $('#student-copy');
        var schoolCopy = $('#school-copy');
        schoolCopy.append(studentCopy.html())
    });
</script>
</html>
