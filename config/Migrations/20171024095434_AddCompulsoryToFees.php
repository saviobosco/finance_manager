<?php
use Migrations\AbstractMigration;

class AddCompulsoryToFees extends AbstractMigration
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
        $table = $this->table('fees');

        $table->addColumn('compulsory', 'boolean', [
            'default' => 0,
            'null' => true,
            'after' => 'amount',
            'comment' => 'Used to mark a fee as compulsory'
        ]);

        $table->update();
    }
}
