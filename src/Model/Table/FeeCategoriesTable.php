<?php
namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeeCategories Model
 *
 * @property \App\Model\Table\FeesTable|\Cake\ORM\Association\HasMany $Fees
 *
 * @method \App\Model\Entity\FeeCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeeCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FeeCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeeCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeeCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeeCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeeCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeeCategoriesTable extends Table
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

        $this->setTable('fee_categories');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Fees', [
            'foreignKey' => 'fee_category_id'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }

    public function findIncomeByFeeCategories()
    {
        return $this->find('all')
            ->select(['id','type','income_amount'])
            ->toArray();
    }

    public function deleteFeeCategory(EntityInterface $feeCategory)
    {
        if ((bool)$this->Fees->find()->where(['fee_category_id' => $feeCategory->id])->first()) {
            throw new \PDOException;
        }
        $this->delete($feeCategory);
        return true;
    }

}
