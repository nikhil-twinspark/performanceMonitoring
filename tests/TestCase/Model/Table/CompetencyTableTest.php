<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetencyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetencyTable Test Case
 */
class CompetencyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetencyTable
     */
    public $Competency;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.competency'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Competency') ? [] : ['className' => 'App\Model\Table\CompetencyTable'];
        $this->Competency = TableRegistry::get('Competency', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Competency);

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
