<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Expenditure[]|\Cake\Collection\CollectionInterface $expenditures
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Expenditure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenditure Categories'), ['controller' => 'ExpenditureCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expenditure Category'), ['controller' => 'ExpenditureCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expenditures index large-9 medium-8 columns content">
    <h3><?= __('Expenditures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expenditure_categories_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purpose') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenditures as $expenditure): ?>
            <tr>
                <td><?= $this->Number->format($expenditure->id) ?></td>
                <td><?= $expenditure->has('expenditure_category') ? $this->Html->link($expenditure->expenditure_category->id, ['controller' => 'ExpenditureCategories', 'action' => 'view', $expenditure->expenditure_category->id]) : '' ?></td>
                <td><?= h($expenditure->purpose) ?></td>
                <td><?= h($expenditure->date) ?></td>
                <td><?= h($expenditure->created) ?></td>
                <td><?= h($expenditure->modified) ?></td>
                <td><?= h($expenditure->created_by) ?></td>
                <td><?= h($expenditure->modified_by) ?></td>
                <td><?= $this->Number->format($expenditure->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $expenditure->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expenditure->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expenditure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenditure->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
