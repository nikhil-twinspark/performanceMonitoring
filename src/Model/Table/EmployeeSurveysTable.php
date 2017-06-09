<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeSurveys Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EmployeeSurveyResponsesTable|\Cake\ORM\Association\HasMany $EmployeeSurveyResponses
 * @property |\Cake\ORM\Association\HasMany $EmployeeSurveyResults
 *
 * @method \App\Model\Entity\EmployeeSurvey get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeSurvey newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeeSurvey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurvey|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeSurvey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurvey[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurvey findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeeSurveysTable extends Table
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

        $this->setTable('employee_surveys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EmployeeSurveyResponses', [
            'foreignKey' => 'employee_survey_id'
        ]);
        $this->hasMany('EmployeeSurveyResults', [
            'foreignKey' => 'employee_survey_id'
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
            ->integer('iteration')
            ->requirePresence('iteration', 'create')
            ->notEmpty('iteration');

        $validator
            ->dateTime('end_time')
            ->allowEmpty('end_time');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
