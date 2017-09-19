<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentFeePaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentFeePaymentsTable Test Case
 */
class StudentFeePaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentFeePaymentsTable
     */
    public $StudentFeePayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_fee_payments',
        'app.student_fees',
        'app.students',
        'app.sessions',
        'app.fees',
        'app.fee_categories',
        'app.terms',
        'app.classes',
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
        $config = TableRegistry::exists('StudentFeePayments') ? [] : ['className' => StudentFeePaymentsTable::class];
        $this->StudentFeePayments = TableRegistry::get('StudentFeePayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentFeePayments);

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

    public function testSavePayment()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
