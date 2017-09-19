<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ExpenditureCategory $expenditureCategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expenditure Category'), ['action' => 'edit', $expenditureCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expenditure Category'), ['action' => 'delete', $expenditureCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenditureCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expenditure Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expenditure Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expenditureCategories view large-9 medium-8 columns content">
    <h3><?= h($expenditureCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($expenditureCategory->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($expenditureCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expenditureCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($expenditureCategory->modified) ?></td>
        </tr>
    </table>
</div>
