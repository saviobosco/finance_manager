<?php
$user = ${$tableAlias};
echo $this->assign('title','Add New Account'); ?>
<div class="row m-b-30">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Create New Account </h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Add New Account') ?></legend>
                    <?php
                    echo $this->Form->input('username',['class'=>'form-control']);
                    echo $this->Form->input('password',['class'=>'form-control']);
                    echo $this->Form->input('email',['class'=>'form-control']);
                    echo $this->Form->input('first_name',['class'=>'form-control']);
                    echo $this->Form->input('last_name',['class'=>'form-control']);
                    $roles = ['user'=>'User','bursar'=>'Bursar','admin' => 'Admin'];

                    echo $this->Form->input('role', [
                        'options' => $roles,
                        'class'=>'form-control','escape'=>false,
                    ]);
                    echo $this->Form->input('active',['data-render'=>'switchery']);
                    echo $this->Form->input('is_superuser',['data-render'=>'switchery']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>