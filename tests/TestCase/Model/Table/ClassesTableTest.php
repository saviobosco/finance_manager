<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassesTable Test Case
 */
class ClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassesTable
     */
    public $Classes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.classes',
        'app.fees',
        'app.students',
        'app.sessions',
        'app.student_fees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Classes') ? [] : ['className' => ClassesTable::class];
        $this->Classes = TableRegistry::get('Classes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Classes);

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
}
