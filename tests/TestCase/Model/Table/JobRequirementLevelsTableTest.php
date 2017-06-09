<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobRequirementLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobRequirementLevelsTable Test Case
 */
class JobRequirementLevelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobRequirementLevelsTable
     */
    public $JobRequirementLevels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_requirement_levels',
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
        'app.employee_surveys',
        'app.employee_survey_results'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobRequirementLevels') ? [] : ['className' => JobRequirementLevelsTable::class];
        $this->JobRequirementLevels = TableRegistry::get('JobRequirementLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobRequirementLevels);

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
