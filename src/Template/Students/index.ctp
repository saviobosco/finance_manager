<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Student[]|\Cake\Collection\CollectionInterface $students
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Fees'), ['controller' => 'StudentFees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Fee'), ['controller' => 'StudentFees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students index large-9 medium-8 columns content">
    <h3><?= __('Students') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('religion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('home_residence') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guardian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relationship_to_guardian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('occupation_of_guardian') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guardian_phone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= h($student->id) ?></td>
                <td><?= h($student->first_name) ?></td>
                <td><?= h($student->last_name) ?></td>
                <td><?= h($student->date_of_birth) ?></td>
                <td><?= h($student->gender) ?></td>
                <td><?= $this->Number->format($student->state_id) ?></td>
                <td><?= h($student->religion) ?></td>
                <td><?= h($student->home_residence) ?></td>
                <td><?= h($student->guardian) ?></td>
                <td><?= h($student->relationship_to_guardian) ?></td>
                <td><?= h($student->occupation_of_guardian) ?></td>
                <td><?= h($student->guardian_phone_number) ?></td>
                <td><?= h($student->session_id) ?></td>
                <td><?= $this->Number->format($student->class_id) ?></td>
                <td><?= h($student->photo) ?></td>
                <td><?= h($student->photo_dir) ?></td>
                <td><?= h($student->created) ?></td>
                <td><?= h($student->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
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
