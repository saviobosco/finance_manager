<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlocksTable Test Case
 */
class BlocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlocksTable
     */
    public $Blocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blocks',
        'app.classes',
        'app.fees',
        'app.fee_categories',
        'app.terms',
        'app.sessions',
        'app.students',
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
        'app.incomes',
        'app.religions',
        'app.income_by_fees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Blocks') ? [] : ['className' => BlocksTable::class];
        $this->Blocks = TableRegistry::get('Blocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blocks);

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
