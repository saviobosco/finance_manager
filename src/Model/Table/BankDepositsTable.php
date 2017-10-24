<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankDeposits Model
 *
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\BanksTable|\Cake\ORM\Association\BelongsTo $Banks
 *
 * @method \App\Model\Entity\BankDeposit get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankDeposit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankDeposit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankDeposit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankDeposit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankDeposit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankDeposit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankDepositsTable extends Table
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

        $this->setTable('bank_deposits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
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
            ->requirePresence('teller_number', 'create')
            ->notEmpty('teller_number');

        $validator
            ->decimal('amount_paid')
            ->requirePresence('amount_paid', 'create')
            ->notEmpty('amount_paid');

        $validator
            ->requirePresence('depositor_name', 'create')
            ->notEmpty('depositor_name');

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
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));

        return $rules;
    }
}
