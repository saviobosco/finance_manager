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
                'value' => 'SkyGrid',
                'description' => NULL,
                'type' => '',
                'editable' => '1',
                'weight' => '0',
                'autoload' => '1',
                'created' => '2017-10-23 12:31:07',
                'modified' => '2017-11-03 12:47:52',
            ],
            [
                'id' => '2',
                'name' => 'Application.school_motto',
                'value' => '',
                'description' => NULL,
                'type' => '',
                'editable' => '1',
                'weight' => '0',
                'autoload' => '1',
                'created' => '2017-11-01 19:15:28',
                'modified' => '2017-11-03 13:00:07',
            ],
        ];

        $table = $this->table('settings_configurations');
        $table->insert($data)->save();
    }
}
