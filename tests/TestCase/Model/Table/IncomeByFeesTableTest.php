<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomeByFeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomeByFeesTable Test Case
 */
class IncomeByFeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomeByFeesTable
     */
    public $IncomeByFees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.income_by_fees',
        'app.fees',
        'app.fee_categories',
        'app.terms',
        'app.classes',
        'app.students',
        'app.sessions',
        'app.student_fees',
        'app.student_fee_payments',
        'app.receipts',
        'app.payments',
        'app.payment_types',
        'app.bank_deposits',
        'app.banks',
        'app.bank_transfers',
        'app.bank_paid_froms',
        'app.bank_paid_tos',
        'app.created_by_user',
        'app.social_accounts',
        'app.users',
        'app.modified_by_user',
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
        $config = TableRegistry::exists('IncomeByFees') ? [] : ['className' => IncomeByFeesTable::class];
        $this->IncomeByFees = TableRegistry::get('IncomeByFees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncomeByFees);

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
