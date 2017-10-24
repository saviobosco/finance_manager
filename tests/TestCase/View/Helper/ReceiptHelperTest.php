<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ReceiptHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ReceiptHelper Test Case
 */
class ReceiptHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\ReceiptHelper
     */
    public $Receipt;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Receipt = new ReceiptHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Receipt);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
