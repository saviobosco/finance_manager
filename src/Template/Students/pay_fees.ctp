<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="students view large-9 medium-8 columns content">
    <?= $this->Form->create() ?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Fees') ?></th>
            <th scope="col"><?= __('Amount') ?></th>
            <th scope="col"><?= __('Amount') ?></th>
            <th scope="col"><?= __('Class') ?></th>
            <th scope="col"><?= __('Session') ?></th>
        </tr>
        <?php $count = count($studentFees); ?>
        <?php for ($num = 0; $num < $count; $num++ ): ?>
            <tr>
                <td><?= h($studentFees[$num]->fee->fee_category->type) ?></td>
                <td><?= ($studentFees[$num]->amount_remaining)? $studentFees[$num]->amount_remaining : $studentFees[$num]->fee->amount  ?></td>
                <td><?= $this->Form->hidden($num.'.amount_to_pay',['value'=>($studentFees[$num]->amount_remaining)? $studentFees[$num]->amount_remaining : $studentFees[$num]->fee->amount]) ?></td>
                <td><?= $this->Form->control($num.'.amount_paid') ?></td>
                <td><?= $this->Form->hidden($num.'.student_fee_id',['value'=>$studentFees[$num]->id]) ?></td>
                <td><?= h($classes[$studentFees[$num]->fee->class_id]) ?></td>
                <td><?= h($sessions[$studentFees[$num]->fee->class_id]) ?></td>

            </tr>
        <?php endfor; ?>
    </table>
    <?= $this->Form->submit(__('Pay Fees')) ?>

    <?= $this->Form->end() ?>
</div>
