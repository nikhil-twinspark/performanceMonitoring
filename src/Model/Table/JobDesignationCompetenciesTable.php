<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobDesignationCompetencies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $JobDesignations
 * @property \Cake\ORM\Association\BelongsTo $Competencies
 * @property \Cake\ORM\Association\HasMany $JobRequirementLevels
 *
 * @method \App\Model\Entity\JobDesignationCompetency get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignationCompetency findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobDesignationCompetenciesTable extends Table
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

        $this->table('job_designation_competencies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JobDesignations', [
            'foreignKey' => 'job_designation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Competencies', [
            'foreignKey' => 'competency_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('JobRequirementLevels', [
            'foreignKey' => 'job_designation_competency_id',
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
        $rules->add($rules->existsIn(['job_designation_id'], 'JobDesignations'));
        $rules->add($rules->existsIn(['competency_id'], 'Competencies'));

        return $rules;
    }
}
