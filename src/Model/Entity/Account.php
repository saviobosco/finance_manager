<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/17/17
 * Time: 7:26 PM
 */

namespace App\Model\Entity;


use CakeDC\Users\Model\Entity\User;

class Account extends User
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'is_superuser' => true,
        'role' => true,
    ];

    protected function _getFullName() {
        return $this->_properties['first_name'].' '.$this->_properties['last_name'];
    }

}