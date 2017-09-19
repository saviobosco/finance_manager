<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentFee Entity
 *
 * @property int $id
 * @property string $student_id
 * @property int $fee_id
 * @property bool $paid
 * @property float $amount_remaining
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Fee $fee
 * @property \App\Model\Entity\StudentFeePayment[] $student_fee_payments
 */
class StudentFee extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
