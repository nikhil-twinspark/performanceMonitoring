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
        'app.job_designation_competencies',
        'app.job_designations',
        'app.user_job_designations',
        'app.users',
        'app.employee_survey_responses',
        'app.employee_surveys',
        'app.response_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResponseGroups') ? [] : ['className' => 'App\Model\Table\ResponseGroupsTable'];
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
