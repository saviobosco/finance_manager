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
                ['action' => 'delete', $expenditure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $expenditure->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Expenditure') ?></legend>
        <?php
            echo $this->Form->control('expenditure_categories_id', ['options' => $expenditureCategories]);
            echo $this->Form->control('purpose');
            echo $this->Form->control('date');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
