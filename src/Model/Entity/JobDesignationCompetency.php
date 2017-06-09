<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobDesignationCompetency Entity
 *
 * @property int $id
 * @property int $job_designation_id
 * @property int $competency_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\JobDesignation $job_designation
 * @property \App\Model\Entity\Competency $competency
 * @property \App\Model\Entity\JobRequirementLevel[] $job_requirement_levels
 */
class JobDesignationCompetency extends Entity
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
