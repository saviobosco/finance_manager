<?php
use Migrations\AbstractMigration;

class AddToIncomeAmountToFeeCategories extends AbstractMigration
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
        $table = $this->table('fee_categories');

        $table->addColumn('income_amount', 'decimal', [
            'default' => 0,
            'null' => false,
            'after' => 'description'
        ]);


        $table->update();
    }
}
