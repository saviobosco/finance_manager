<?php
use Migrations\AbstractSeed;

/**
 * Classes seed.
 */
class ClassesSeed extends AbstractSeed
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
                'class' => 'JSS 1',
                'block_id' => '1',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
            [
                'id' => '2',
                'class' => 'JSS 2',
                'block_id' => '1',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
            [
                'id' => '3',
                'class' => 'JSS 3',
                'block_id' => '1',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
            [
                'id' => '4',
                'class' => 'SSS 1',
                'block_id' => '2',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
            [
                'id' => '5',
                'class' => 'SSS 2',
                'block_id' => '2',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
            [
                'id' => '6',
                'class' => 'SSS 3',
                'block_id' => '2',
                'created' => '2017-10-11 12:17:54',
                'modified' => '2017-10-11 12:17:54',
            ],
        ];

        $table = $this->table('classes');
        $table->insert($data)->save();
    }
}
