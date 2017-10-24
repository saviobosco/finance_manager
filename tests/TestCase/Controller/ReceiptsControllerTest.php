<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReceiptsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReceiptsController Test Case
 */
class ReceiptsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receipts',
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
