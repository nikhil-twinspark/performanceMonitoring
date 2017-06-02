<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeSurveyResult Entity
 *
 * @property int $id
 * @property int $employee_survey_id
 * @property int $competency_id
 * @property int $current_level
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\EmployeeSurvey $employee_survey
 * @property \App\Model\Entity\Competency $competency
 */
class EmployeeSurveyResult extends Entity
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
