<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobRequirementLevel Model
 *
 * @property \Cake\ORM\Association\BelongsTo $JobDesignationCompetencies
 *
 * @method \App\Model\Entity\JobRequirementLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobRequirementLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobRequirementLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobRequirementLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobRequirementLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobRequirementLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobRequirementLevel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobRequirementLevelTable extends Table
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

        $this->table('job_requirement_level');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JobDesignationCompetencies', [
            'foreignKey' => 'job_designation_competency_id',
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
            ->integer('required_level')
            ->requirePresence('required_level', 'create')
            ->notEmpty('required_level');

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
        $rules->add($rules->existsIn(['job_designation_competency_id'], 'JobDesignationCompetencies'));

        return $rules;
    }
}
