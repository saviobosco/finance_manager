<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Change Password </h4>
            </div>
            <div class="panel-body">
                <div class="users form">
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __d('CakeDC/Users', 'Please enter the new password') ?></legend>
                        <?php if ($validatePassword) : ?>
                            <?= $this->Form->input('current_password', [
                                'type' => 'password',
                                'required' => true,
                                'label' => __d('CakeDC/Users', 'Current password')]);
                            ?>
                        <?php endif; ?>
                        <?= $this->Form->input('password'); ?>
                        <?= $this->Form->input('password_confirm', ['type' => 'password', 'required' => true]); ?>

                    </fieldset>
                    <?= $this->Form->button(__d('CakeDC/Users', 'Change Password'),['class'=>'btn btn-primary']); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>