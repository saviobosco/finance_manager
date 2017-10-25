<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel panel-heading">
                <h4 class="panel-title"> <?= __('Edit Session') ?> </h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($session) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('session');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>