<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportingManagerSubordinatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportingManagerSubordinatesTable Test Case
 */
class ReportingManagerSubordinatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportingManagerSubordinatesTable
     */
    public $ReportingManagerSubordinates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reporting_manager_subordinates',
        'app.reporting_managers',
        'app.subordinates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReportingManagerSubordinates') ? [] : ['className' => ReportingManagerSubordinatesTable::class];
        $this->ReportingManagerSubordinates = TableRegistry::get('ReportingManagerSubordinates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportingManagerSubordinates);

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
