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
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="Saviobosco" name="author" />

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <?= $this->Site->css('bootstrap/css/bootstrap.min.css','plugin') ?>
    <?= $this->Site->css('css/animate.min.css','assets') ?>
    <?= $this->Site->css('css/style.css','assets') ?>
    <?= $this->Site->css('css/style-responsive.min.css','assets') ?>
    <?= $this->Site->css('css/theme/default.css','assets') ?>
    <!-- ================== END BASE CSS STYLE ================== -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="">


<!-- begin #page-container -->
<div id="page-container">
    <?= $this->fetch('content') ?>
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<?= $this->Site->script('jquery/jquery-1.9.1.min.js','plugin') ?>
<?= $this->Site->script('bootstrap/js/bootstrap.min.js','plugin') ?>
<!--[if lt IE 9]>
<?= $this->Site->script('crossbrowserjs/html5shiv.js','assets') ?>
<?= $this->Site->script('crossbrowserjs/respond.min.js','assets') ?>
<?= $this->Site->script('crossbrowserjs/excanvas.min.js','assets') ?>
<![endif]-->

<!-- ================== END BASE JS ================== -->




</body>


</html>
