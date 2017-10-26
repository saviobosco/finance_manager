<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 * @property \App\Model\Table\ClassesTable|\Cake\ORM\Association\BelongsTo $Classes
 * @property \App\Model\Table\StudentFeesTable|\Cake\ORM\Association\HasMany $StudentFees
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
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

        /*$this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);*/
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('StudentFees', [
            'foreignKey' => 'student_id'
        ]);

        $this->hasMany('Receipts', [
            'foreignKey' => 'student_id'
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
            ->requirePresence('id', 'create')
            ->notEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->allowEmpty('religion');

        $validator
            ->allowEmpty('home_residence');

        $validator
            ->allowEmpty('guardian');

        $validator
            ->allowEmpty('relationship_to_guardian');

        $validator
            ->allowEmpty('occupation_of_guardian');

        $validator
            ->allowEmpty('guardian_phone_number');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('photo_dir');

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
        //$rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['class_id'], 'Classes'));

        return $rules;
    }

    public function getStudentFees($student_id)
    {
        /*return $this->StudentFees->Fees->find('all')
            ->contain([
                'FeeCategories' => function ($q) {
                    return $q->select(['FeeCategories.id','FeeCategories.type']);
                },
                'StudentFees' => function ($q) use ($student_id){
                    return $q->where(['student_id'=>$student_id,'paid'=>0]);
                }
            ])->groupBy('session_id')->toArray();*/

        $studentFees = $this->StudentFees->find('all')
            ->contain(['Fees.FeeCategories' => function ($q) {
                return
                    $q->select(['FeeCategories.id','FeeCategories.type']);
                    $q->orderDesc('Fees.created');
            }])->where(['student_id'=>$student_id,'paid'=>0]);

        return $studentFees/*->groupBy('fee.session_id')*/->toArray();
    }

    public function getStudentFeesWithTermClassSession($student_id,$term_id,$class_id,$session_id)
    {
        $studentFees = $this->StudentFees->find('all')
            ->contain(['Fees.FeeCategories' => function ($q) use ($term_id,$class_id,$session_id) {
                if ( empty($term_id) ) {
                    return
                        $q->select(['FeeCategories.id','FeeCategories.type'])
                            ->where(['Fees.class_id' => $class_id,'Fees.session_id' => $session_id])
                            ->orderDesc('Fees.created');
                } else {
                    return
                        $q->select(['FeeCategories.id','FeeCategories.type'])
                            ->where(['Fees.class_id' => $class_id,'Fees.session_id' => $session_id,'Fees.term_id' => $term_id ])
                            ->orderDesc('Fees.created');
                }

            }])->where(['student_id'=>$student_id,'paid'=>0]);

        return $studentFees->toArray();
    }


    public function getReceiptDetails($receipt_id)
    {
        $receiptsTable = TableRegistry::get('Receipts');
        return $receiptDetails = $receiptsTable->find('all')->contain([
            'Payments',
            'StudentFeePayments.StudentFees.Fees.FeeCategories' => function($q) {
                return
                    $q->select(['FeeCategories.id','FeeCategories.type']);
                    $q->orderDesc('Fees.created');
            }
        ])->where(['Receipts.id'=>$receipt_id])->first();
    }

    public function getStudentsWithId( $id )
    {
        return $this->find('all')->contain(['Classes'])->where(['Students.id'=>$id])->toArray();
    }

    public function getStudentArrears($student_id)
    {
        return $studentFees = $this->StudentFees->find('all')
            ->contain(['Fees.FeeCategories' => function ($q) {
                return
                    $q->select(['FeeCategories.id','FeeCategories.type']);
                $q->orderDesc('Fees.created');
            }
            ])->where(['student_id'=>$student_id,'paid'=>0])->toArray();
    }

    public function getStudentPaymentReceipts()
    {

    }

    public function changeStudentsClass($class_id,$student_ids)
    {
        $returnData['success'] = 1;
        // get the students one by one
        foreach ( $student_ids as $student_id) {
            $student = $this->find()->select(['id','class_id'])->where(['id'=>$student_id])->first();
            // change the class
            if ( !$student ) {
                continue;
            }
            if ( $student->class_id == $class_id ) {
                $returnData['success'] = 0;
                break;
            }
            $student->class_id = $class_id;
            $this->save($student);
        }
        return $returnData;
    }
}
