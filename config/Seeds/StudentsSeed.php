<?php
use Migrations\AbstractSeed;

/**
 * Students seed.
 */
class StudentsSeed extends AbstractSeed
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
        $data = [];
        $table = $this->table('students');
        $faker = Faker\Factory::create();


        for($num = 1 ; $num < 1000 ; $num++) {

            // creating fake data
            $data['id'] = $num;
            $data['first_name'] = $faker->firstName;
            $data['last_name'] = $faker->lastName;
            $data['date_of_birth'] = $faker->date($format = 'Y-m-d', $max = 'now');
            $data['gender'] = 'male';
            $data['home_residence'] = $faker->address;
            $data['session_id'] = rand(1,2);
            $data['class_id'] = rand(1,6);
            $data['created'] = date('Y-m-d H:i:s');
            $data['modified'] = date('Y-m-d H:i:s');
            $table->insert($data)->save();
        }
    }
}
