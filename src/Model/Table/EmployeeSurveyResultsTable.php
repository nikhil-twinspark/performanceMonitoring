<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeSurveyResults Model
 *
 * @property \Cake\ORM\Association\BelongsTo $EmployeeSurveys
 * @property \Cake\ORM\Association\BelongsTo $Competencies
 *
 * @method \App\Model\Entity\EmployeeSurveyResult get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSurveyResult findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeeSurveyResultsTable extends Table
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

        $this->table('employee_survey_results');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EmployeeSurveys', [
            'foreignKey' => 'employee_survey_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Competencies', [
            'foreignKey' => 'competency_id',
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
            ->integer('current_level')
            ->requirePresence('current_level', 'create')
            ->notEmpty('current_level');

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
        $rules->add($rules->existsIn(['competency_id'], 'Competencies'));

        return $rules;
    }
}
