<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomesTable Test Case
 */
class IncomesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomesTable
     */
    public $Incomes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.incomes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Incomes') ? [] : ['className' => IncomesTable::class];
        $this->Incomes = TableRegistry::get('Incomes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Incomes);

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
