<?php
use Cake\Core\Configure;
?>
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <?= $this->Html->link(Configure::read('Application.name').'<small style="font-style: italic"> '.Configure::read('Application.type').' </small> ','/',['class'=>'navbar-brand','escape'=>false]) ?>
            <a href="index.html" class="navbar-brand"> </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
            <li class="navbar-form full-width">
            </li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <?= $this->Site->displayAdminPhoto($this->request->session()->read('Auth.User.photo')) ?>
                    <span class="hidden-xs">
                        <?= ucfirst($this->request->session()->read('Auth.User.first_name')) ?>
                    </span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li>
                        <?= $this->Html->link('View Profile',['plugin'=>null,'controller'=>'Accounts','action'=>'profile']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('Change Password',['plugin'=>null,'controller'=>'Accounts','action'=>'changePassword']) ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= $this->Html->link('Log Out',['plugin'=>null,'controller'=>'Accounts','action'=>'logout']) ?>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>