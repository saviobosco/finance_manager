<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel panel-heading">
                <h4 class="panel-title"> <?= __('Edit Class') ?> </h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($class) ?>
                <fieldset>
                    <legend><?= __('Add Class') ?></legend>
                    <?php
                    echo $this->Form->control('class');
                    echo $this->Form->control('block_id',['options'=>$blocks]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>