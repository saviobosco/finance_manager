<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FeeCategory $feeCategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fee Category'), ['action' => 'edit', $feeCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fee Category'), ['action' => 'delete', $feeCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fee Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feeCategories view large-9 medium-8 columns content">
    <h3><?= h($feeCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($feeCategory->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feeCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($feeCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($feeCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fees') ?></h4>
        <?php if (!empty($feeCategory->fees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fee Category Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Term Id') ?></th>
                <th scope="col"><?= __('Class Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($feeCategory->fees as $fees): ?>
            <tr>
                <td><?= h($fees->id) ?></td>
                <td><?= h($fees->fee_category_id) ?></td>
                <td><?= h($fees->amount) ?></td>
                <td><?= h($fees->term_id) ?></td>
                <td><?= h($fees->class_id) ?></td>
                <td><?= h($fees->session_id) ?></td>
                <td><?= h($fees->created) ?></td>
                <td><?= h($fees->modified) ?></td>
                <td><?= h($fees->created_by) ?></td>
                <td><?= h($fees->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fees', 'action' => 'view', $fees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fees', 'action' => 'edit', $fees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fees', 'action' => 'delete', $fees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
