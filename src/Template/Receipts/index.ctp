<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Receipt[]|\Cake\Collection\CollectionInterface $receipts
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"><?= __('Receipts') ?></h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th scope="col"><?= h('Ref Number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('total_amount_paid') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($receipts as $receipt): ?>
                        <tr>
                            <td><?= $this->Number->format($receipt->id) ?></td>
                            <td><?= $receipt->has('student') ? $this->Html->link($receipt->student->id, ['controller' => 'Students', 'action' => 'view', $receipt->student->id]) : '' ?></td>
                            <td><?= $this->Number->format($receipt->total_amount_paid) ?></td>
                            <td><?= h($receipt->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $receipt->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $receipt->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $receipt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id)]) ?>
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
        </div>
    </div>
</div>

