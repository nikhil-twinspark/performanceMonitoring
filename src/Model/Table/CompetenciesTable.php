<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competencies Model
 *
 * @property \App\Model\Table\CompetencyQuestionsTable|\Cake\ORM\Association\HasMany $CompetencyQuestions
 * @property \App\Model\Table\EmployeeSurveyResultsTable|\Cake\ORM\Association\HasMany $EmployeeSurveyResults
 * @property \App\Model\Table\JobDesignationCompetenciesTable|\Cake\ORM\Association\HasMany $JobDesignationCompetencies
 *
 * @method \App\Model\Entity\Competency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Competency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Competency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Competency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competency findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompetenciesTable extends Table
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

        $this->setTable('competencies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CompetencyQuestions', [
            'foreignKey' => 'competency_id'
        ]);
        $this->hasMany('EmployeeSurveyResults', [
            'foreignKey' => 'competency_id'
        ]);
        $this->hasMany('JobDesignationCompetencies', [
            'foreignKey' => 'competency_id'
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
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->integer('maximum_level')
            ->requirePresence('maximum_level', 'create')
            ->notEmpty('maximum_level');

        $validator
            ->allowEmpty('description');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

        return $validator;
    }
}
