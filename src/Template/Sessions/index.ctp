<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Session[]|\Cake\Collection\CollectionInterface $sessions
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel panel-heading">
                <h4 class="panel-title"> <?= __('Sessions') ?> </h4>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('session') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sessions as $session): ?>
                        <tr>
                            <td><?= $this->Number->format($session->id) ?></td>
                            <td><?= h($session->session) ?></td>
                            <td><?= h($session->created) ?></td>
                            <td><?= h($session->modified) ?></td>
                            <td><?= h($session->created_by_user->first_name.' '.$session->created_by_user->last_name) ?></td>
                            <td><?= h($session->modified_by_user->first_name.' '.$session->modified_by_user->last_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $session->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?>
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