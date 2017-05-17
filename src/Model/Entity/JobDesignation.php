<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobDesignation Entity
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $is_deleted
 *
 * @property \App\Model\Entity\UserJobDesignation[] $user_job_designations
 * @property \App\Model\Entity\JobDesignationCompetency[] $job_designation_competencies
 */
class JobDesignation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
