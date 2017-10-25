<?php
use Migrations\AbstractSeed;

/**
 * SettingsConfigurations seed.
 */
class SettingsConfigurationsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Application.school_name',
                'value' => 'Ideal Minds ',
                'description' => NULL,
                'type' => '',
                'editable' => '1',
                'weight' => '0',
                'autoload' => '1',
                'created' => '2017-10-23 12:31:07',
                'modified' => '2017-10-23 12:50:29',
            ],
        ];

        $table = $this->table('settings_configurations');
        $table->insert($data)->save();
    }
}
