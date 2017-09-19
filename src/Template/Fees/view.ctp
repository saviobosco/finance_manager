<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Fee $fee
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fee'), ['action' => 'edit', $fee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fee'), ['action' => 'delete', $fee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fee Categories'), ['controller' => 'FeeCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fee Category'), ['controller' => 'FeeCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Fees'), ['controller' => 'StudentFees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Fee'), ['controller' => 'StudentFees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fees view large-9 medium-8 columns content">
    <h3><?= h($fee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fee Category') ?></th>
            <td><?= $fee->has('fee_category') ? $this->Html->link($fee->fee_category->id, ['controller' => 'FeeCategories', 'action' => 'view', $fee->fee_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Term') ?></th>
            <td><?= $fee->has('term') ? $this->Html->link($fee->term->id, ['controller' => 'Terms', 'action' => 'view', $fee->term->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class') ?></th>
            <td><?= $fee->has('class') ? $this->Html->link($fee->class->id, ['controller' => 'Classes', 'action' => 'view', $fee->class->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= $fee->has('session') ? $this->Html->link($fee->session->id, ['controller' => 'Sessions', 'action' => 'view', $fee->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($fee->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= h($fee->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($fee->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fee->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Student Fees') ?></h4>
        <?php if (!empty($fee->student_fees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Fee Id') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Amount Remaining') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fee->student_fees as $studentFees): ?>
            <tr>
                <td><?= h($studentFees->id) ?></td>
                <td><?= h($studentFees->student_id) ?></td>
                <td><?= h($studentFees->fee_id) ?></td>
                <td><?= h($studentFees->paid) ?></td>
                <td><?= h($studentFees->amount_remaining) ?></td>
                <td><?= h($studentFees->created) ?></td>
                <td><?= h($studentFees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentFees', 'action' => 'view', $studentFees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentFees', 'action' => 'edit', $studentFees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentFees', 'action' => 'delete', $studentFees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentFees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
