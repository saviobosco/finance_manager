<?php
use Migrations\AbstractMigration;

class AddTotalAmountsToReceipts extends AbstractMigration
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
        $table = $this->table('receipts');
        $table->addColumn('total_amount_paid', 'decimal', [
            'default' => null,
            'null' => false,
            'after' => 'student_id'
        ]);

        $table->update();
    }
}
