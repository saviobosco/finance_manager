<?php
use Migrations\AbstractSeed;

/**
 * Terms seed.
 */
class TermsSeed extends AbstractSeed
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
                'term' => 'First Term',
                'created' => '2017-09-17 22:58:57',
                'modified' => '2017-09-17 22:58:57',
                'created_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
                'modified_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
            ],
            [
                'id' => '2',
                'term' => 'Second Term',
                'created' => '2017-09-17 22:59:08',
                'modified' => '2017-09-17 22:59:08',
                'created_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
                'modified_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
            ],
            [
                'id' => '3',
                'term' => 'Third Term',
                'created' => '2017-09-17 22:59:17',
                'modified' => '2017-09-17 22:59:17',
                'created_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
                'modified_by' => '512cf4d2-026d-4d14-8515-b508debda73c',
            ],
        ];

        $table = $this->table('terms');
        $table->insert($data)->save();
    }
}
