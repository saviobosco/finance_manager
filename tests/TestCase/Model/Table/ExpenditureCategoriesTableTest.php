<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpenditureCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpenditureCategoriesTable Test Case
 */
class ExpenditureCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpenditureCategoriesTable
     */
    public $ExpenditureCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.expenditure_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExpenditureCategories') ? [] : ['className' => ExpenditureCategoriesTable::class];
        $this->ExpenditureCategories = TableRegistry::get('ExpenditureCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExpenditureCategories);

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
