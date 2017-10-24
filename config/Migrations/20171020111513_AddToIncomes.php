<?php
use Migrations\AbstractMigration;

class AddToIncomes extends AbstractMigration
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
        $table = $this->table('incomes');

        $table->addColumn('amount','decimal',[
            'after' => 'id',
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('week','integer',[
            'limit' => 11,
            'after' => 'amount',
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('month','integer',[
            'limit' => 11,
            'after' => 'week',
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('year','integer',[
            'limit' => 11,
            'after' => 'month',
            'default' => null,
            'null' => false,
        ]);

        $table->removeColumn('student_fee_payment_id');

        $table->update();
    }

    public function down()
    {

    }
}
