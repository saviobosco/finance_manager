<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Expenditure $expenditure
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expenditure'), ['action' => 'edit', $expenditure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expenditure'), ['action' => 'delete', $expenditure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenditure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expenditures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expenditure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenditure Categories'), ['controller' => 'ExpenditureCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expenditure Category'), ['controller' => 'ExpenditureCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expenditures view large-9 medium-8 columns content">
    <h3><?= h($expenditure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Expenditure Category') ?></th>
            <td><?= $expenditure->has('expenditure_category') ? $this->Html->link($expenditure->expenditure_category->id, ['controller' => 'ExpenditureCategories', 'action' => 'view', $expenditure->expenditure_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purpose') ?></th>
            <td><?= h($expenditure->purpose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($expenditure->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= h($expenditure->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($expenditure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($expenditure->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($expenditure->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expenditure->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($expenditure->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Expenses') ?></h4>
        <?php if (!empty($expenditure->expenses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Expenditure Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($expenditure->expenses as $expenses): ?>
            <tr>
                <td><?= h($expenses->id) ?></td>
                <td><?= h($expenses->expenditure_id) ?></td>
                <td><?= h($expenses->created) ?></td>
                <td><?= h($expenses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
