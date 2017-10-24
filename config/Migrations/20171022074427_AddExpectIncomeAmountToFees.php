<?php
use Migrations\AbstractMigration;

class AddExpectIncomeAmountToFees extends AbstractMigration
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
        $table = $this->table('fees');

        $table->addColumn('income_amount_expected', 'decimal', [
            'default' => null,
            'null' => false,
            'after' => 'amount'
        ]);

        $table->addColumn('amount_earned', 'decimal', [
            'default' => 0,
            'null' => false,
            'after' => 'income_amount_expected'
        ]);

        $table->addColumn('number_of_students', 'integer',[
            'default' => null,
            'null' => false,
            'limit' => 11,
            'after' => 'amount_earned'
        ]);

        $table->update();
    }
}
