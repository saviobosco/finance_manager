<?php
use Migrations\AbstractMigration;

class CreateIncomeByFees extends AbstractMigration
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
        $table = $this->table('income_by_fees');

        $table->addColumn('fee_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);

        $table->addColumn('amount', 'decimal', [
            'default' => 0.00,
            'null' => true,
        ]);

        $table->create();
    }
}
