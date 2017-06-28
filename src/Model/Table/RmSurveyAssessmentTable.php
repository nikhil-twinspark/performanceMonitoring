<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RmSurveyAssessment Model
 *
 * @property \App\Model\Table\EmployeeSurveyResponsesTable|\Cake\ORM\Association\BelongsTo $EmployeeSurveyResponses
 * @property \App\Model\Table\RmResponseOptionsTable|\Cake\ORM\Association\BelongsTo $RmResponseOptions
 *
 * @method \App\Model\Entity\RmSurveyAssessment get($primaryKey, $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RmSurveyAssessment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RmSurveyAssessmentTable extends Table
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

        $this->setTable('rm_survey_assessment');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EmployeeSurveyResponses', [
            'foreignKey' => 'employee_survey_response_id',
            'joinType' => 'INNER',
            'saveStrategy' => 'replace'

        ]);
        // $this->belongsTo('RmResponseOptions', [
        //     'foreignKey' => 'rm_response_option_id'
        // ]);
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
            ->allowEmpty('rm_comment');

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
        $rules->add($rules->existsIn(['employee_survey_response_id'], 'EmployeeSurveyResponses'));
        // $rules->add($rules->existsIn(['rm_response_option_id'], 'RmResponseOptions'));

        return $rules;
    }
}
