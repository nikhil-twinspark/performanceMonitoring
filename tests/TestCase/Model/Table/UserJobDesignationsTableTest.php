<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserJobDesignationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserJobDesignationsTable Test Case
 */
class UserJobDesignationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserJobDesignationsTable
     */
    public $UserJobDesignations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_job_designations',
        'app.users',
        'app.job_designations',
        'app.job_designation_competencies',
        'app.competencies',
        'app.competency_questions',
        'app.questions',
        'app.response_groups',
        'app.employee_survey_responses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserJobDesignations') ? [] : ['className' => 'App\Model\Table\UserJobDesignationsTable'];
        $this->UserJobDesignations = TableRegistry::get('UserJobDesignations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserJobDesignations);

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
