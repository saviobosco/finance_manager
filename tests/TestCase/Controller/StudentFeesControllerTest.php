<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudentFeesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StudentFeesController Test Case
 */
class StudentFeesControllerTest extends IntegrationTestCase
{

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
        'app.income_by_fees',
        'app.created_by_user',
        'app.social_accounts',
        'app.users',
        'app.modified_by_user',
        'app.receipts',
        'app.student_fee_payments',
        'app.incomes',
        'app.payments',
        'app.payment_types',
        'app.bank_deposits',
        'app.banks',
        'app.bank_transfers',
        'app.bank_paid_froms',
        'app.bank_paid_tos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
