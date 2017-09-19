<?php
use Migrations\AbstractMigration;

class ChangeAmountTypeInExpenses extends AbstractMigration
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
        $table = $this->table('expenses');

        // add the expenditure_id column and change the type to integer
        $table->addColumn('expenditure_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after' => 'id'
        ]);
        $table->update();
    }
}
