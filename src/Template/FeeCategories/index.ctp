<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FeeCategory[]|\Cake\Collection\CollectionInterface $feeCategories
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fee Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feeCategories index large-9 medium-8 columns content">
    <h3><?= __('Fee Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feeCategories as $feeCategory): ?>
            <tr>
                <td><?= $this->Number->format($feeCategory->id) ?></td>
                <td><?= h($feeCategory->type) ?></td>
                <td><?= h($feeCategory->created) ?></td>
                <td><?= h($feeCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $feeCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feeCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feeCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeCategory->id)]) ?>
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
