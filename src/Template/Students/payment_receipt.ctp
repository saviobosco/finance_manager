<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="students view large-9 medium-8 columns content">
    <?php if (!empty($receiptDetails->student_fee_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Fees') ?></th>
                <th scope="col"><?= __('Amount Paid') ?></th>
                <th scope="col"><?= __('Amount Remaining') ?></th>
            </tr>
            <?php foreach ($receiptDetails->student_fee_payments as $studentFeePayment): ?>
                <tr>
                    <td><?= h($studentFeePayment->student_fee->fee->fee_category->type) ?></td>
                    <td><?= h($studentFeePayment->amount_paid) ?></td>
                    <td><?= h($studentFeePayment->amount_remaining) ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"> Total</td>
                <td> total displayed here</td>
            </tr>
        </table>
    <?php endif; ?>
    Receipt will be displayed here .....
</div>
