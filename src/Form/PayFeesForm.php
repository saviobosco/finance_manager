<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/20/17
 * Time: 7:14 AM
 */

namespace App\Form;


use Cake\Form\Form;
use Cake\Validation\Validator;

class PayFeesForm extends Form
{
    // todo : review this
    protected function _buildValidator(Validator $validator)
    {
        return
            $validator
                ->requirePresence("payment[payment_made_by]",true,['message' => 'This value is required '])
                ->notEmpty('payment.payment_made_by');
    }
}