<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponseGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponseGroupsTable Test Case
 */
class ResponseGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponseGroupsTable
     */
    public $ResponseGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.response_groups',
        'app.questions',
        'app.competency_questions',
        'app.competencies',
        'app.employee_survey_results',
        'app.employee_surveys',
        'app.users',
        'app.employee_survey_responses',
        'app.response_options',
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
        $config = TableRegistry::exists('ResponseGroups') ? [] : ['className' => ResponseGroupsTable::class];
        $this->ResponseGroups = TableRegistry::get('ResponseGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResponseGroups);

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
}
