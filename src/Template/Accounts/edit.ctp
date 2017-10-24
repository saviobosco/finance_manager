<?php
$user = ${$tableAlias};
 $this->assign('title','Editing User '.$user->full_name); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Edit Account </h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('first_name',['class'=>'form-control']);
                    echo $this->Form->input('last_name',['class'=>'form-control']);
                    echo $this->Form->input('email',['class'=>'form-control']);
                    $roles = ['user'=>'User','bursar'=>'Bursar','admin' => 'Admin'];
                    echo $this->Form->input('role', [
                        'options' =>$roles,
                        'class'=>'form-control','escape'=>false,
                    ]);
                    echo $this->Form->input('active',['type'=>'checkbox','data-render'=>'switchery']);

                    echo $this->Form->input('is_superuser',['type'=>'checkbox','data-render'=>'switchery']);
                    ?>

                </fieldset>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>



