<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeCategoriesTable Test Case
 */
class FeeCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeCategoriesTable
     */
    public $FeeCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fee_categories',
        'app.fees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FeeCategories') ? [] : ['className' => FeeCategoriesTable::class];
        $this->FeeCategories = TableRegistry::get('FeeCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FeeCategories);

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
