<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Edit Receipt </h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($receipt) ?>
                <fieldset>
                    <legend><?= __('Edit Receipt') ?></legend>
                    <?php
                    echo $this->Form->control('ref_number');
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('total_amount_paid');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

