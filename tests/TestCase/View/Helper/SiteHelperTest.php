<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SiteHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\SiteHelper Test Case
 */
class SiteHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\SiteHelper
     */
    public $Site;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Site = new SiteHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Site);

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
