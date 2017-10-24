<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankTransfers Model
 *
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\BankPaidFromsTable|\Cake\ORM\Association\BelongsTo $BankPaidFroms
 * @property \App\Model\Table\BankPaidTosTable|\Cake\ORM\Association\BelongsTo $BankPaidTos
 *
 * @method \App\Model\Entity\BankTransfer get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankTransfer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankTransfer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankTransfer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankTransfer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankTransfer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankTransfer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankTransfersTable extends Table
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

        $this->setTable('bank_transfers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BankPaidFroms', [
            'foreignKey' => 'bank_paid_from_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BankPaidTos', [
            'foreignKey' => 'bank_paid_to_id',
            'joinType' => 'INNER'
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

        $validator
            ->requirePresence('account_number_paid_from', 'create')
            ->notEmpty('account_number_paid_from');

        $validator
            ->requirePresence('account_number_paid_to', 'create')
            ->notEmpty('account_number_paid_to');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->date('date_paid')
            ->requirePresence('date_paid', 'create')
            ->notEmpty('date_paid');

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
        $rules->add($rules->existsIn(['payment_id'], 'Payments'));
        $rules->add($rules->existsIn(['bank_paid_from_id'], 'BankPaidFroms'));
        $rules->add($rules->existsIn(['bank_paid_to_id'], 'BankPaidTos'));

        return $rules;
    }
}
