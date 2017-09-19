<?php
use Migrations\AbstractMigration;

class AddRecieptIdToStudentFeePayments extends AbstractMigration
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
        $table = $this->table('student_fee_payments');

        $table->addColumn('receipt_id', 'integer', [
            'limit' => 11,
            'default' => null,
            'null' => false,
            'after' => 'amount_remaining'
        ]);

        $table->update();
    }

    public function down()
    {
        $table = $this->table('student_fee_payments');

        $table->removeColumn('receipt_id');

        $table->update();
    }
}
