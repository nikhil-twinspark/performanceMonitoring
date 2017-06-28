<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RmSurveyAssessmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RmSurveyAssessmentTable Test Case
 */
class RmSurveyAssessmentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RmSurveyAssessmentTable
     */
    public $RmSurveyAssessment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rm_survey_assessment',
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
        'app.job_requirement_levels',
        'app.rm_response_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RmSurveyAssessment') ? [] : ['className' => RmSurveyAssessmentTable::class];
        $this->RmSurveyAssessment = TableRegistry::get('RmSurveyAssessment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RmSurveyAssessment);

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
