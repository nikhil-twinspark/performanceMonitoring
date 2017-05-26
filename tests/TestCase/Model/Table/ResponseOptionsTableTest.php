<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponseOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponseOptionsTable Test Case
 */
class ResponseOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponseOptionsTable
     */
    public $ResponseOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.response_options',
        'app.response_groups',
        'app.questions',
        'app.competency_questions',
        'app.competencies',
        'app.job_designation_competencies',
        'app.job_designations',
        'app.user_job_designations',
        'app.users',
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
        $config = TableRegistry::exists('ResponseOptions') ? [] : ['className' => 'App\Model\Table\ResponseOptionsTable'];
        $this->ResponseOptions = TableRegistry::get('ResponseOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResponseOptions);

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
