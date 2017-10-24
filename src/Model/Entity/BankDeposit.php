<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankDeposit Entity
 *
 * @property int $id
 * @property int $payment_id
 * @property string $teller_number
 * @property int $bank_id
 * @property float $amount_paid
 * @property string $depositor_name
 * @property \Cake\I18n\FrozenDate $date_paid
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\Bank $bank
 */
class BankDeposit extends Entity
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
