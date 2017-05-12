<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobDesignations Model
 *
 * @property \Cake\ORM\Association\HasMany $UserJobDesignations
 *
 * @method \App\Model\Entity\JobDesignation get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobDesignation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobDesignation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobDesignation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobDesignation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobDesignationsTable extends Table
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

        $this->table('job_designations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserJobDesignations', [
            'foreignKey' => 'job_designation_id'
        ]);
        $this->hasMany('JobDesignationCompetencies', [
            'foreignKey' => 'job_designation_id',
            'saveStrategy' => 'replace'
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

        return $validator;
    }
}
