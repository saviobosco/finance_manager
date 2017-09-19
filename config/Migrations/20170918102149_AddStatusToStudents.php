<?php
use Migrations\AbstractMigration;

class AddStatusToStudents extends AbstractMigration
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
        $table = $this->table('students');
        $table->addColumn('status', 'boolean', [
            'default' => 1,
            'null' => false,
        ]);

        $table->update();
    }

    public function down()
    {
        $table = $this->table('students');
        $table->removeColumn('status');

        $table->update();
    }
}
