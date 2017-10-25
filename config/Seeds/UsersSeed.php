<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '512cf4d2-026d-4d14-8515-b508debda73c',
                'username' => 'admin',
                'email' => 'admin@localhost.com',
                'password' => '$2y$10$KF1VUqsiTmemBIBAXABhke41G6zE1gjl4Fc.bBiaQLPupW/SRUq9K',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'token' => NULL,
                'token_expires' => NULL,
                'api_token' => NULL,
                'activation_date' => '2017-09-17 21:21:24',
                'secret' => NULL,
                'secret_verified' => NULL,
                'tos_date' => NULL,
                'active' => '1',
                'is_superuser' => '0',
                'role' => 'user',
                'created' => '2017-09-17 21:21:24',
                'modified' => '2017-09-17 21:21:24',
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
