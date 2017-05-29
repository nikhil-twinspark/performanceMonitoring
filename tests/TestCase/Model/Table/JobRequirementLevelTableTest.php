<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobRequirementLevelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobRequirementLevelTable Test Case
 */
class JobRequirementLevelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobRequirementLevelTable
     */
    public $JobRequirementLevel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_requirement_level',
        'app.job_designation_competencies',
        'app.job_designations',
        'app.user_job_designations',
        'app.users',
        'app.competencies',
        'app.competency_questions',
        'app.questions',
        'app.response_groups',
        'app.response_options',
        'app.employee_survey_responses',
        'app.employee_surveys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobRequirementLevel') ? [] : ['className' => 'App\Model\Table\JobRequirementLevelTable'];
        $this->JobRequirementLevel = TableRegistry::get('JobRequirementLevel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobRequirementLevel);

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
