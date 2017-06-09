<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetencyQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetencyQuestionsTable Test Case
 */
class CompetencyQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetencyQuestionsTable
     */
    public $CompetencyQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.competency_questions',
        'app.competencies',
        'app.employee_survey_results',
        'app.employee_surveys',
        'app.users',
        'app.employee_survey_responses',
        'app.questions',
        'app.response_groups',
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
        $config = TableRegistry::exists('CompetencyQuestions') ? [] : ['className' => CompetencyQuestionsTable::class];
        $this->CompetencyQuestions = TableRegistry::get('CompetencyQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompetencyQuestions);

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
