<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReportingManagerSubordinates Model
 *
 * @property \App\Model\Table\ReportingManagersTable|\Cake\ORM\Association\BelongsTo $ReportingManagers
 * @property \App\Model\Table\SubordinatesTable|\Cake\ORM\Association\BelongsTo $Subordinates
 *
 * @method \App\Model\Entity\ReportingManagerSubordinate get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReportingManagerSubordinate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportingManagerSubordinatesTable extends Table
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

        $this->setTable('reporting_manager_subordinates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Subordinates',[
            'className' => 'Users', 
            'foreignKey' => 'subordinate_id'
            ]);
        $this->belongsTo('ReportingManagers', [
            'className' => 'Users',
            'foreignKey' => 'reporting_manager_id'
            ]);
        // $this->belongsTo('ReportingManagers', [
        //     'className' => 'Users',
        //     'foreignKey' => 'reporting_manager_id',
        //     'joinType' => 'INNER'
        // ]);
        // $this->belongsTo('Subordinates', [
        //     'className' => 'Users',
        //     'foreignKey' => 'subordinate_id',
        //     'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['reporting_manager_id'], 'ReportingManagers'));
        $rules->add($rules->existsIn(['subordinate_id'], 'Subordinates'));
        $rules->add($rules->IsUnique(['reporting_manager_id', 'subordinate_id'], false));

        return $rules;
    }
}
