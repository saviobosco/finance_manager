<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsTable
     */
    public $Students;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students',
        'app.sessions',
        'app.fees',
        'app.fee_categories',
        'app.terms',
        'app.classes',
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
        $config = TableRegistry::exists('Students') ? [] : ['className' => StudentsTable::class];
        $this->Students = TableRegistry::get('Students', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Students);

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

    /**
     * Test getStudentFees method
     *
     * @return void
     */
    public function testGetStudentFees()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentFeesWithTermClassSession method
     *
     * @return void
     */
    public function testGetStudentFeesWithTermClassSession()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getReceiptDetails method
     *
     * @return void
     */
    public function testGetReceiptDetails()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentsWithId method
     *
     * @return void
     */
    public function testGetStudentsWithId()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentArrears method
     *
     * @return void
     */
    public function testGetStudentArrears()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentPaymentReceipts method
     *
     * @return void
     */
    public function testGetStudentPaymentReceipts()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
