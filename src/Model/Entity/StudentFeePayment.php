<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentFeePayment Entity
 *
 * @property int $id
 * @property int $student_fee_id
 * @property float $amount_paid
 * @property float $amount_remaining
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $created_by
 * @property string $modified_by
 *
 * @property \App\Model\Entity\StudentFee $student_fee
 * @property \App\Model\Entity\Income[] $incomes
 */
class StudentFeePayment extends Entity
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

    /*public function _setAmountRemaining()
    {

    }*/
}
