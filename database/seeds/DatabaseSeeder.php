<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Patient;
use App\CheckupType;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'fullname' => 'Administrator',
            'username' => 'admin',
            'password' => '4afb061e6ffdad1cd8abcd38990fd2b5',
            'userType' => 'admin',
            'mobileNo' => '639090909090',
            'created_at' => Carbon::now(),
        ]);

        DB::table('checkup_types')->insert([
            'categoryName' => 'General Checkup',
            'url' => 'general-checkup',
            'created_at' => Carbon::now(),
        ]);

        DB::table('checkup_types')->insert([
            'categoryName' => 'Pregnancy Checkup',
            'url' => 'pregnancy-checkup',
            'created_at' => Carbon::now(),
        ]);

        DB::table('checkup_types')->insert([
            'categoryName' => 'Vaccines',
            'url' => 'vaccines',
            'created_at' => Carbon::now(),
        ]);
	}
}
