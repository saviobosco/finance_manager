<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expenditure Entity
 *
 * @property int $id
 * @property int $expenditure_categories_id
 * @property string $purpose
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $created_by
 * @property string $modified_by
 * @property float $amount
 *
 * @property \App\Model\Entity\ExpenditureCategory $expenditure_category
 * @property \App\Model\Entity\Expense[] $expenses
 */
class Expenditure extends Entity
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
