<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Student $student
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Fees'), ['controller' => 'StudentFees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Fee'), ['controller' => 'StudentFees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($student->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($student->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($student->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($student->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Religion') ?></th>
            <td><?= h($student->religion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home Residence') ?></th>
            <td><?= h($student->home_residence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guardian') ?></th>
            <td><?= h($student->guardian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relationship To Guardian') ?></th>
            <td><?= h($student->relationship_to_guardian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Occupation Of Guardian') ?></th>
            <td><?= h($student->occupation_of_guardian) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guardian Phone Number') ?></th>
            <td><?= h($student->guardian_phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Id') ?></th>
            <td><?= h($student->session_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($student->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($student->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State Id') ?></th>
            <td><?= $this->Number->format($student->state_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Id') ?></th>
            <td><?= $this->Number->format($student->class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($student->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($student->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($student->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Student Fees') ?></h4>
        <?php if (!empty($student->student_fees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Fees') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Amount Remaining') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Class') ?></th>
                <th scope="col"><?= __('Session') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_fees as $studentFees): ?>
            <tr>
                <td><?= h($studentFees->fee->fee_category->type) ?></td>
                <td><?= h($studentFees->fee->amount) ?></td>
                <td><?= h($studentFees->amount_remaining) ?></td>
                <td><?= h($studentFees->paid) ?></td>
                <td><?= h($classes[$studentFees->fee->class_id]) ?></td>
                <td><?= h($sessions[$studentFees->fee->session_id]) ?></td>
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
