<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReportingManagerSubordinate Entity
 *
 * @property int $id
 * @property int $reporting_manager_id
 * @property int $subordinate_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\ReportingManager $reporting_manager
 * @property \App\Model\Entity\Subordinate $subordinate
 */
class ReportingManagerSubordinate extends Entity
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
