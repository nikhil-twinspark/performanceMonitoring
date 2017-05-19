<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetenciesTable Test Case
 */
class CompetenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetenciesTable
     */
    public $Competencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.competencies',
        'app.job_designation_competencies',
        'app.job_designations',
        'app.user_job_designations',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Competencies') ? [] : ['className' => 'App\Model\Table\CompetenciesTable'];
        $this->Competencies = TableRegistry::get('Competencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Competencies);

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
