<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentFeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentFeesTable Test Case
 */
class StudentFeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentFeesTable
     */
    public $StudentFees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_fees',
        'app.students',
        'app.sessions',
        'app.fees',
        'app.fee_categories',
        'app.terms',
        'app.classes',
        'app.student_fee_payments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentFees') ? [] : ['className' => StudentFeesTable::class];
        $this->StudentFees = TableRegistry::get('StudentFees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentFees);

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
