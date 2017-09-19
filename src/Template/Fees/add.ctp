<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fee Categories'), ['controller' => 'FeeCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fee Category'), ['controller' => 'FeeCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Fees'), ['controller' => 'StudentFees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Fee'), ['controller' => 'StudentFees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fees form large-9 medium-8 columns content">
    <?= $this->Form->create($fee) ?>
    <fieldset>
        <legend><?= __('Add Fee') ?></legend>
        <?php
            echo $this->Form->control('fee_category_id', ['options' => $feeCategories]);
            echo $this->Form->control('amount');
            echo $this->Form->control('term_id', ['options' => $terms, 'empty' => true]);
            echo $this->Form->control('class_id', ['options' => $classes]);
            echo $this->Form->control('session_id', ['options' => $sessions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
