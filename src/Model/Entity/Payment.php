<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $receipt_id
 * @property string $payment_made_by
 * @property int $payment_type_id
 * @property string $payment_received_by
 * @property int $payment_status
 * @property string $payment_approved_by
 * @property \Cake\I18n\FrozenTime $payment_approved_on
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Receipt $receipt
 * @property \App\Model\Entity\PaymentType $payment_type
 * @property \App\Model\Entity\BankDeposit[] $bank_deposits
 * @property \App\Model\Entity\BankTransfer[] $bank_transfers
 */
class Payment extends Entity
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
