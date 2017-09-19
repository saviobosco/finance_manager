<?php
namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Fees Model
 *
 * @property \App\Model\Table\FeeCategoriesTable|\Cake\ORM\Association\BelongsTo $FeeCategories
 * @property \App\Model\Table\TermsTable|\Cake\ORM\Association\BelongsTo $Terms
 * @property \App\Model\Table\ClassesTable|\Cake\ORM\Association\BelongsTo $Classes
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 * @property \App\Model\Table\StudentFeesTable|\Cake\ORM\Association\HasMany $StudentFees
 *
 * @method \App\Model\Entity\Fee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeesTable extends Table
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

        $this->setTable('fees');
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

        $this->belongsTo('FeeCategories', [
            'foreignKey' => 'fee_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Terms', [
            'foreignKey' => 'term_id'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('StudentFees', [
            'foreignKey' => 'fee_id'
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
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');


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
        $rules->add($rules->existsIn(['fee_category_id'], 'FeeCategories'));
        $rules->add($rules->existsIn(['term_id'], 'Terms'));
        $rules->add($rules->existsIn(['class_id'], 'Classes'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }

    public function afterSave(Event $event,EntityInterface $entity )
    {
        if ( $entity->isNew()) {

            $studentsTable = TableRegistry::get('Students');

            // find all student under that fees class and session
            $students = $studentsTable->find('all')
                ->select(['id','class_id','session_id'])
                ->where(['class_id'=>$entity->class_id,'session_id'=>$entity->session_id,'status' => 1])->toArray();

            // iterate through the result set and create their respective fees
            if ( $students ) {
                //Initialize the student fees table
                $studentFeesTable = TableRegistry::get('StudentFees');
                foreach ( $students as $student ) {
                    $newStudentFees = $studentFeesTable->newEntity([
                        'student_id' => $student->id,
                        'fee_id' => $entity->id,
                        'paid' => 0,
                    ]);
                    $studentFeesTable->save($newStudentFees); // Save the student details
                }
            }
        }

    }
}
