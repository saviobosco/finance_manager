<?php
use Migrations\AbstractMigration;

class AddToStudentFeePayments extends AbstractMigration
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

        $table->addColumn('fee_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after' => 'receipt_id',
            'comment' => 'Fee id is need to know fee income',
        ]);

        $table->addColumn('fee_category_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after' => 'fee_id',
            'comment' => 'Fee Category id is need to know fee category income',
        ]);

        $table->update();
    }
}
