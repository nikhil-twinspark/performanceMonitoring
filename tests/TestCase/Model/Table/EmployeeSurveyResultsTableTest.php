<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeSurveyResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeSurveyResultsTable Test Case
 */
class EmployeeSurveyResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeSurveyResultsTable
     */
    public $EmployeeSurveyResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employee_survey_results',
        'app.employee_surveys',
        'app.users',
        'app.employee_survey_responses',
        'app.questions',
        'app.response_groups',
        'app.response_options',
        'app.competency_questions',
        'app.competencies',
        'app.job_designation_competencies',
        'app.job_designations',
        'app.user_job_designations',
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
        $config = TableRegistry::exists('EmployeeSurveyResults') ? [] : ['className' => 'App\Model\Table\EmployeeSurveyResultsTable'];
        $this->EmployeeSurveyResults = TableRegistry::get('EmployeeSurveyResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeSurveyResults);

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
