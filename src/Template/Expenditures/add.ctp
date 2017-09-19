<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Expenditures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expenditure Categories'), ['controller' => 'ExpenditureCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expenditure Category'), ['controller' => 'ExpenditureCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expenditures form large-9 medium-8 columns content">
    <?= $this->Form->create($expenditure) ?>
    <fieldset>
        <legend><?= __('Add Expenditure') ?></legend>
        <?php
            echo $this->Form->control('expenditure_categories_id', ['options' => $expenditureCategories]);
            echo $this->Form->control('purpose');
            echo $this->Form->control('amount');
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
