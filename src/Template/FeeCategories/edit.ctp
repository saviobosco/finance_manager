<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $feeCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feeCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fee Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feeCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($feeCategory) ?>
    <fieldset>
        <legend><?= __('Edit Fee Category') ?></legend>
        <?php
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
