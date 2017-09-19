<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Fee[]|\Cake\Collection\CollectionInterface $fees
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fee'), ['action' => 'add']) ?></li>
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
<div class="fees index large-9 medium-8 columns content">
    <h3><?= __('Fees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fee_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('term_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fees as $fee): ?>
            <tr>
                <td><?= $this->Number->format($fee->id) ?></td>
                <td><?= $fee->has('fee_category') ? $this->Html->link($fee->fee_category->id, ['controller' => 'FeeCategories', 'action' => 'view', $fee->fee_category->id]) : '' ?></td>
                <td><?= $this->Number->format($fee->amount) ?></td>
                <td><?= $fee->has('term') ? $this->Html->link($fee->term->id, ['controller' => 'Terms', 'action' => 'view', $fee->term->id]) : '' ?></td>
                <td><?= $fee->has('class') ? $this->Html->link($fee->class->id, ['controller' => 'Classes', 'action' => 'view', $fee->class->id]) : '' ?></td>
                <td><?= $fee->has('session') ? $this->Html->link($fee->session->id, ['controller' => 'Sessions', 'action' => 'view', $fee->session->id]) : '' ?></td>
                <td><?= h($fee->created) ?></td>
                <td><?= h($fee->modified) ?></td>
                <td><?= h($fee->created_by) ?></td>
                <td><?= h($fee->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fee->id)]) ?>
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
