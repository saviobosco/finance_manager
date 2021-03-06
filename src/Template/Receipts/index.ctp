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
                <table id="data-table" class="table table-responsive">
                    <thead>
                    <tr>
                        <th scope="col"><?= h('Ref #') ?></th>
                        <th scope="col"><?= __('<i class="fa fa-user"></i> Students') ?></th>
                        <th scope="col"><?= __('<i class="fa fa-money"></i>Total Amount Paid') ?></th>
                        <th scope="col"><?= __('Paid By') ?></th>
                        <th scope="col"><?= __('<i class="fa fa-calendar"></i> Date Generated') ?></th>
                        <th scope="col"><?= __('<i class="fa fa-user"></i> Generated By') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($receipts as $receipt): ?>
                        <tr>
                            <td><?= $this->Number->format($receipt->id) ?></td>
                            <td><?= $receipt->student->first_name.' '.$receipt->student->last_name ?></td>
                            <td><?= $this->Currency->displayCurrency($receipt->total_amount_paid) ?></td>
                            <td><?= $receipt->payment->payment_made_by ?></td>
                            <td><?= h($receipt->created) ?></td>
                            <td><?= h($receipt->created_by_user->first_name.' '.$receipt->created_by_user->first_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i class="fa fa-print"></i>Print',['action'=>'printReceipt',$receipt->id],['class'=>'btn btn-inverse btn-sm','escape'=>false]) ?>
                                <?= $this->Html->link(__('View'), ['action' => 'view', $receipt->id],['class'=>'btn btn-primary btn-sm','escape'=>false]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $receipt->id],['class'=>'btn btn-info btn-sm','escape'=>false]) ?>
                                <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $receipt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id),'class'=>'btn btn-danger btn-sm','escape'=>false,'disabled'=>true]) ?>
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

