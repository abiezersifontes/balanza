<?php

use Illuminate\Database\Seeder;

class BeneficiaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Beneficiary::class)->times(100)->create();
    }
}
