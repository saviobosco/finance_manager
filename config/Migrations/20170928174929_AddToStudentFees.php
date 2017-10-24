<?php
use Migrations\AbstractMigration;

class AddToStudentFees extends AbstractMigration
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
        $table = $this->table('student_fees');

        $table->addColumn('amount', 'decimal', [
            'default' => null,
            'null' => true,
            'after' => 'fee_id'
        ]);

        $table->addColumn('purpose', 'string', [
            'limit' => 255,
            'default' => null,
            'null' => true,
            'after' => 'amount_remaining'
        ]);

        $table->addColumn('created_by', 'uuid', [
            'default' => null,
            'null' => false,
            'after' => 'modified'
        ]);

        $table->addColumn('modified_by', 'uuid', [
            'default' => null,
            'null' => false,
            'after' => 'created_by'
        ]);

        $table->update();

    }
}
