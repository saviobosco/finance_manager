<?php
use Migrations\AbstractMigration;

class AddCreatedByAndModifiedByToReceipts extends AbstractMigration
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

        $table->addColumn('created_by', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified_by', 'uuid', [
            'default' => null,
            'null' => false,
        ]);

        $table->update();
    }

    public function down()
    {
        $table = $this->table('receipts');

        $table->removeColumn('created_by');

        $table->removeColumn('modified_by');

        $table->update();
    }
}
