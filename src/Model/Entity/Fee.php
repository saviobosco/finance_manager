<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fee Entity
 *
 * @property int $id
 * @property int $fee_category_id
 * @property int $compulsory
 * @property float $amount
 * @property float $income_amount_expected
 * @property float $amount_earned
 * @property int $number_of_students
 * @property int $term_id
 * @property int $class_id
 * @property int $session_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $created_by
 * @property string $modified_by
 *
 * @property \App\Model\Entity\FeeCategory $fee_category
 * @property \App\Model\Entity\Term $term
 * @property \App\Model\Entity\Classe $class
 * @property \App\Model\Entity\Session $session
 * @property \App\Model\Entity\StudentFee[] $student_fees
 */
class Fee extends Entity
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
