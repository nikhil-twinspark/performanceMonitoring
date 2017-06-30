<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeSurveyResponsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeSurveyResponsesTable Test Case
 */
class EmployeeSurveyResponsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeSurveyResponsesTable
     */
    public $EmployeeSurveyResponses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employee_survey_responses',
        'app.employee_surveys',
        'app.users',
        'app.roles',
        'app.user_old_passwords',
        'app.user_job_designations',
        'app.job_designations',
        'app.job_designation_competencies',
        'app.competencies',
        'app.competency_questions',
        'app.questions',
        'app.response_groups',
        'app.response_options',
        'app.employee_survey_results',
        'app.job_requirement_levels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmployeeSurveyResponses') ? [] : ['className' => EmployeeSurveyResponsesTable::class];
        $this->EmployeeSurveyResponses = TableRegistry::get('EmployeeSurveyResponses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeSurveyResponses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
