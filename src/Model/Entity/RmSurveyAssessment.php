<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RmSurveyAssessment Entity
 *
 * @property int $id
 * @property int $employee_survey_response_id
 * @property int $rm_response_option_id
 * @property string $rm_comment
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\EmployeeSurveyResponse $employee_survey_response
 */
class RmSurveyAssessment extends Entity
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
