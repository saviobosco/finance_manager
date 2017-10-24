<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankDepositsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankDepositsTable Test Case
 */
class BankDepositsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankDepositsTable
     */
    public $BankDeposits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_deposits',
        'app.payments',
        'app.banks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BankDeposits') ? [] : ['className' => BankDepositsTable::class];
        $this->BankDeposits = TableRegistry::get('BankDeposits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankDeposits);

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
