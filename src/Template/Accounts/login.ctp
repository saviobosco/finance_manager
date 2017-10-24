<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;
$this->layout = 'login';
?>

<!-- begin login -->
<div class="login animated fadeInDown">

    <!-- begin brand -->
    <div class="login-header">
        <div class="brand">
            <span class="text-center"> Finance Manager </span>
            <small>A simple Application to Manager fees and Expenditures </small>
        </div>
    </div>
    <!-- end brand -->
    <div class="login-content">
        <?= $this->Flash->render() ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-header text-center"> Account Login </h4>
            </div>
            <div class="panel-body">

                <?= $this->Form->create() ?>
                <fieldset>
                    <?= $this->Form->control('username', ['required' => true]) ?>
                    <?= $this->Form->control('password', ['required' => true]) ?>
                    <?php
                    if (Configure::read('Users.RememberMe.active')) {
                        echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                            'type' => 'checkbox',
                            'label' => __d('CakeDC/Users', 'Remember me'),
                            'checked' => Configure::read('Users.RememberMe.checked')
                        ]);
                    }
                    ?>
                    <?php
                    $registrationActive = Configure::read('Users.Registration.active');
                    if ($registrationActive) {
                        echo $this->Html->link(__d('CakeDC/Users', 'Register'), ['action' => 'register']);
                    }
                    if (Configure::read('Users.Email.required')) {
                        if ($registrationActive) {
                            echo ' | ';
                        }
                        echo $this->Html->link(__d('CakeDC/Users', 'Reset Password'), ['action' => 'requestResetPassword']);
                    }
                    ?>
                </fieldset>
                <?= $this->Form->button(__d('CakeDC/Users', 'Login'),['class'=>'btn btn-success btn-block btn-lg']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<!-- end login -->



<div class="users form">
    <?= $this->Flash->render('auth') ?>

</div>
