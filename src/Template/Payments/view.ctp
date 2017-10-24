<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Payment $payment
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receipts'), ['controller' => 'Receipts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receipt'), ['controller' => 'Receipts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Types'), ['controller' => 'PaymentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Type'), ['controller' => 'PaymentTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Deposits'), ['controller' => 'BankDeposits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Deposit'), ['controller' => 'BankDeposits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Transfers'), ['controller' => 'BankTransfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Transfer'), ['controller' => 'BankTransfers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?= h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Receipt') ?></th>
            <td><?= $payment->has('receipt') ? $this->Html->link($payment->receipt->id, ['controller' => 'Receipts', 'action' => 'view', $payment->receipt->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Made By') ?></th>
            <td><?= h($payment->payment_made_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Type') ?></th>
            <td><?= $payment->has('payment_type') ? $this->Html->link($payment->payment_type->type, ['controller' => 'PaymentTypes', 'action' => 'view', $payment->payment_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Received By') ?></th>
            <td><?= h($payment->payment_received_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Approved By') ?></th>
            <td><?= h($payment->payment_approved_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= $this->Number->format($payment->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Approved On') ?></th>
            <td><?= h($payment->payment_approved_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($payment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($payment->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Deposits') ?></h4>
        <?php if (!empty($payment->bank_deposits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Teller Number') ?></th>
                <th scope="col"><?= __('Bank Id') ?></th>
                <th scope="col"><?= __('Amount Paid') ?></th>
                <th scope="col"><?= __('Depositor Name') ?></th>
                <th scope="col"><?= __('Date Paid') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($payment->bank_deposits as $bankDeposits): ?>
            <tr>
                <td><?= h($bankDeposits->id) ?></td>
                <td><?= h($bankDeposits->payment_id) ?></td>
                <td><?= h($bankDeposits->teller_number) ?></td>
                <td><?= h($bankDeposits->bank_id) ?></td>
                <td><?= h($bankDeposits->amount_paid) ?></td>
                <td><?= h($bankDeposits->depositor_name) ?></td>
                <td><?= h($bankDeposits->date_paid) ?></td>
                <td><?= h($bankDeposits->created) ?></td>
                <td><?= h($bankDeposits->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankDeposits', 'action' => 'view', $bankDeposits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankDeposits', 'action' => 'edit', $bankDeposits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankDeposits', 'action' => 'delete', $bankDeposits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankDeposits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bank Transfers') ?></h4>
        <?php if (!empty($payment->bank_transfers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Account Number Paid From') ?></th>
                <th scope="col"><?= __('Bank Paid From Id') ?></th>
                <th scope="col"><?= __('Account Number Paid To') ?></th>
                <th scope="col"><?= __('Bank Paid To Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Date Paid') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($payment->bank_transfers as $bankTransfers): ?>
            <tr>
                <td><?= h($bankTransfers->id) ?></td>
                <td><?= h($bankTransfers->payment_id) ?></td>
                <td><?= h($bankTransfers->account_number_paid_from) ?></td>
                <td><?= h($bankTransfers->bank_paid_from_id) ?></td>
                <td><?= h($bankTransfers->account_number_paid_to) ?></td>
                <td><?= h($bankTransfers->bank_paid_to_id) ?></td>
                <td><?= h($bankTransfers->amount) ?></td>
                <td><?= h($bankTransfers->date_paid) ?></td>
                <td><?= h($bankTransfers->created) ?></td>
                <td><?= h($bankTransfers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankTransfers', 'action' => 'view', $bankTransfers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankTransfers', 'action' => 'edit', $bankTransfers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankTransfers', 'action' => 'delete', $bankTransfers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankTransfers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
