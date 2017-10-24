<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CurrencyHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CurrencyHelper Test Case
 */
class CurrencyHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CurrencyHelper
     */
    public $Currency;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Currency = new CurrencyHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Currency);

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
