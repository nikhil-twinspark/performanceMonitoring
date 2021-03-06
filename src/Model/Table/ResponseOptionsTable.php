<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResponseOptions Model
 *
 * @property \App\Model\Table\ResponseGroupsTable|\Cake\ORM\Association\BelongsTo $ResponseGroups
 * @property \App\Model\Table\EmployeeSurveyResponsesTable|\Cake\ORM\Association\HasMany $EmployeeSurveyResponses
 *
 * @method \App\Model\Entity\ResponseOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResponseOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResponseOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResponseOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResponseOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResponseOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResponseOption findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResponseOptionsTable extends Table
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

        $this->setTable('response_options');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ResponseGroups', [
            'foreignKey' => 'response_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EmployeeSurveyResponses', [
            'foreignKey' => 'response_option_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['response_group_id'], 'ResponseGroups'));

        return $rules;
    }
}
