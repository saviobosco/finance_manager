<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use RandomLib\Factory;
use SecurityLib\Strength;

/**
 * Receipts Model
 *
 * @property \App\Model\Table\StudentFeePaymentsTable|\Cake\ORM\Association\HasMany $StudentFeePayments
 *
 * @method \App\Model\Entity\Receipt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Receipt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Receipt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Receipt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Receipt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Receipt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Receipt findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReceiptsTable extends Table
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

        $this->setTable('receipts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Muffin/Footprint.Footprint', [
            'events' => [
                'Model.beforeSave' => [
                    'created_by' => 'new',
                    'modified_by' => 'always'
                ]
            ],
        ]);

        $this->hasMany('StudentFeePayments', [
            'foreignKey' => 'receipt_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('Payments', [
            'foreignKey' => 'receipt_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('CreatedByUser',[
            'className' => 'Accounts',
            'foreignKey' => 'created_by'
        ]);

        $this->belongsTo('ModifiedByUser',[
            'className' => 'Accounts',
            'foreignKey' => 'modified_by'
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


        return $validator;
    }

    public function generateReceipt($student_id,$total)
    {
        $newData = $this->newEntity([
            'student_id' => $student_id,
            'total_amount_paid' => $total
        ]);
        return $this->save($newData);
    }
}
