<?php
use Migrations\AbstractMigration;

class CreateExpenseByExpenditureCategories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('expense_by_expenditure_categories');
        $table->addColumn('expenditure_category_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('amount', 'decimal', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }
}
