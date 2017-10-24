<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankTransfersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankTransfersTable Test Case
 */
class BankTransfersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankTransfersTable
     */
    public $BankTransfers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_transfers',
        'app.payments',
        'app.bank_paid_froms',
        'app.bank_paid_tos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BankTransfers') ? [] : ['className' => BankTransfersTable::class];
        $this->BankTransfers = TableRegistry::get('BankTransfers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankTransfers);

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
