<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeSurveyResponses Model
 *
 * @property \App\Model\Table\EmployeeSurveysTable|\Cake\ORM\Association\BelongsTo $EmployeeSurveys
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\ResponseOptionsTable|\Cake\ORM\Association\BelongsTo $ResponseOptions
 *
 * @method \App\Model\Entity\EmployeeSurveyResponse get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResponse findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeeSurveyResponsesTable extends Table
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

        $this->setTable('employee_survey_responses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EmployeeSurveys', [
            'foreignKey' => 'employee_survey_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ResponseOptions', [
            'foreignKey' => 'response_option_id',
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
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['employee_survey_id'], 'EmployeeSurveys'));
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['response_option_id'], 'ResponseOptions'));

        return $rules;
    }
}
