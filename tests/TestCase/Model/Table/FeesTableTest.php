<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeesTable Test Case
 */
class FeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeesTable
     */
    public $Fees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.bank_deposits',
    ];

    public static function setUpBeforeClass()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fees') ? [] : ['className' => FeesTable::class];
        $this->Fees = TableRegistry::get('Fees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fees);

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
     * Test createFee method
     *
     * @return void
     */
    public function testCreateFee()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test checkIfFeeExistingForTermClassSession method
     *
     * @return void
     */
    public function testCheckIfFeeExistingForTermClassSession()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test createStudentsFeeRecordByClass method
     *
     * @return void
     */
    public function testCreateStudentsFeeRecordByClass()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test createNewFee method
     *
     * @return void
     */
    public function testCreateNewFee()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getFeeDefaulters method
     *
     * @return void
     */
    public function testGetFeeDefaulters()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentsData method
     *
     * @return void
     */
    public function testGetStudentsData()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getFeeWithClassSessionTerm method
     *
     * @return void
     */
    public function testGetFeeWithClassSessionTerm()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test createStudentsFeeRecord method
     *
     * @return void
     */
    public function testCreateStudentsFeeRecord()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getFeeDefaultersByFeeId method
     *
     * @return void
     */
    public function testGetFeeDefaultersByFeeId()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getFeeCompleteStudentsByFeeId method
     *
     * @return void
     */
    public function testGetFeeCompleteStudentsByFeeId()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getStudentWithCompleteFees method
     *
     * @return void
     */
    public function testGetStudentWithCompleteFees()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getCompulsoryFeesByParameters method
     *
     * @return void
     */
    public function testGetCompulsoryFeesByParameters()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test queryFeesTable method
     *
     * @return void
     */
    public function testQueryFeesTable()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getFeeCategoriesData method
     *
     * @return void
     */
    public function testGetFeeCategoriesData()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
