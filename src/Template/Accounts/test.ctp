<?php foreach ($receiptDetails->student_fee_payments as $studentArrears): ?>
    <tr>
        <td><?= h($studentArrears->student_fee->fee->fee_category->type.' ('.$classes[$studentArrears->student_fee->fee->class_id].'/'.$sessions[$studentArrears->student_fee->fee->session_id].'/'.$terms[$studentArrears->student_fee->fee->term_id].')' ) ?></td>
        <td><?= $this->Currency->displayCurrency($studentArrears->amount_paid) ?></td>

    </tr>
<?php endforeach; ?>