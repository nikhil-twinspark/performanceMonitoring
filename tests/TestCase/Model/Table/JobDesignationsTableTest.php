<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobDesignationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobDesignationsTable Test Case
 */
class JobDesignationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobDesignationsTable
     */
    public $JobDesignations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_designations',
        'app.user_job_designations',
        'app.users',
        'app.job_designation_competencies',
        'app.competencies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobDesignations') ? [] : ['className' => 'App\Model\Table\JobDesignationsTable'];
        $this->JobDesignations = TableRegistry::get('JobDesignations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobDesignations);

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
