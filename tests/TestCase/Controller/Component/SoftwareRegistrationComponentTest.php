<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SoftwareRegistrationComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SoftwareRegistrationComponent Test Case
 */
class SoftwareRegistrationComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SoftwareRegistrationComponent
     */
    public $SoftwareRegistration;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->SoftwareRegistration = new SoftwareRegistrationComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SoftwareRegistration);

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
