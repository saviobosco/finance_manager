<?php
use Migrations\AbstractMigration;

class AddStudentIdToReceipts extends AbstractMigration
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

        $table->addColumn('student_id', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
            'after' => 'ref_number'
        ]);

        $table->update();
    }
}
