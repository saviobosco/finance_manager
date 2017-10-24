<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\I18n\Date;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \App\Model\Table\ReceiptsTable|\Cake\ORM\Association\BelongsTo $Receipts
 * @property \App\Model\Table\PaymentTypesTable|\Cake\ORM\Association\BelongsTo $PaymentTypes
 * @property \App\Model\Table\BankDepositsTable|\Cake\ORM\Association\HasMany $BankDeposits
 * @property \App\Model\Table\BankTransfersTable|\Cake\ORM\Association\HasMany $BankTransfers
 *
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Receipts', [
            'foreignKey' => 'receipt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PaymentTypes', [
            'foreignKey' => 'payment_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BankDeposits', [
            'foreignKey' => 'payment_id'
        ]);
        $this->hasMany('BankTransfers', [
            'foreignKey' => 'payment_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        /*$validator
            ->requirePresence('payment_made_by', 'create')
            ->notEmpty('payment_made_by');*/

        $validator
            ->uuid('payment_received_by')
            ->requirePresence('payment_received_by', 'create')
            ->notEmpty('payment_received_by');

        $validator
            ->integer('payment_status')
            ->requirePresence('payment_status', 'create')
            ->notEmpty('payment_status');

        $validator
            ->uuid('payment_approved_by')
            ->allowEmpty('payment_approved_by');

        $validator
            ->dateTime('payment_approved_on')
            ->allowEmpty('payment_approved_on');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['receipt_id'], 'Receipts'));
        $rules->add($rules->existsIn(['payment_type_id'], 'PaymentTypes'));

        return $rules;
    }

    public function generatePaymentRecord( Array $data,$receipt)
    {

        $data['payment_status'] = 0;
        $newEntity = $this->newEntity($data);
        $savedPaymentRecord = $this->save($newEntity);
        if ( !$savedPaymentRecord ) {
            return false;
        }

        /*$event = new Event('Model.Payments.afterPayment',$this,[
            'receipt' => $receipt
        ]);
        // dispatch payment event
        $this->eventManager()->dispatch($event);*/

        return $savedPaymentRecord;
    }


    public function getPaymentDetails($payment_id)
    {
        return $this->find('all')->where(['id'=>$payment_id])->first();
    }

}
