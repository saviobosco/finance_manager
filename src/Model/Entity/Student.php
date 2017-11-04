<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $gender
 * @property int $state_id
 * @property string $religion
 * @property string $home_residence
 * @property string $guardian
 * @property string $relationship_to_guardian
 * @property string $occupation_of_guardian
 * @property string $guardian_phone_number
 * @property string $session_id
 * @property int $class_id
 * @property int $status
 * @property string $photo
 * @property string $photo_dir
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Session $session
 * @property \App\Model\Entity\Class $class
 * @property \App\Model\Entity\StudentFee[] $student_fees
 */
class Student extends Entity
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
        'id' => true
    ];
}
