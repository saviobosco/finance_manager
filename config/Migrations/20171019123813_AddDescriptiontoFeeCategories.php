<?php
use Migrations\AbstractMigration;

class AddDescriptiontoFeeCategories extends AbstractMigration
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
        $table = $this->table('fee_categories');

        $table->addColumn('description','text',[
            'default' => null,
            'null' => true,
            'after' => 'type'
        ]);
        $table->update();

    }

    public function drop()
    {
        $this->table('fee_categories')->removeColumn('description');
    }
}
