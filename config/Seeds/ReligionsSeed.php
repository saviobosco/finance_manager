<?php
use Migrations\AbstractSeed;

/**
 * Religions seed.
 */
class ReligionsSeed extends AbstractSeed
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
                'name' => 'Christianity',
            ],
            [
                'id' => '2',
                'name' => 'Muslim',
            ],
            [
                'id' => '3',
                'name' => 'None',
            ],
        ];

        $table = $this->table('religions');
        $table->insert($data)->save();
    }
}
