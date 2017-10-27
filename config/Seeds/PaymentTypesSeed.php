<?php
use Migrations\AbstractSeed;

/**
 * PaymentTypes seed.
 */
class PaymentTypesSeed extends AbstractSeed
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
                'type' => 'Cash',
                'created' => '2017-09-30 11:14:22',
                'modified' => '2017-09-30 11:14:22',
            ],
            [
                'id' => '2',
                'type' => 'Cheque',
                'created' => '2017-09-30 11:14:34',
                'modified' => '2017-09-30 11:14:34',
            ],
            [
                'id' => '3',
                'type' => 'Bank Deposit',
                'created' => '2017-09-30 11:14:52',
                'modified' => '2017-09-30 11:14:52',
            ],
            [
                'id' => '4',
                'type' => 'Bank Transfer',
                'created' => '2017-09-30 11:19:42',
                'modified' => '2017-09-30 11:19:42',
            ],
        ];

        $table = $this->table('payment_types');
        $table->insert($data)->save();
    }
}
