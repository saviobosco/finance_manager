<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankTransfer Entity
 *
 * @property int $id
 * @property int $payment_id
 * @property string $account_number_paid_from
 * @property int $bank_paid_from_id
 * @property string $account_number_paid_to
 * @property int $bank_paid_to_id
 * @property float $amount
 * @property \Cake\I18n\FrozenDate $date_paid
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\BankPaidFrom $bank_paid_from
 * @property \App\Model\Entity\BankPaidTo $bank_paid_to
 */
class BankTransfer extends Entity
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
