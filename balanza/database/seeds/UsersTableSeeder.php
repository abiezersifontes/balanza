<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	/*
        DB::table('users')->insert([
            'name'      => 'Abiezer Sifontes',
            'email'     => 'asifontes@cabelum.com.ve',
            'password'  =>  bcrypt('2580abiezer'),
            'role'      =>  'admin'
        ]);
        DB::table('users')->insert([
            'name'      => 'Karla Castro',
            'email'     => 'kcastro@cabelum.com.ve',
            'password'  =>  bcrypt('kcastro'),
            'role'      =>  'editor'
        ]);
	*/
        DB::table('users')->insert([
            'name'      => 'Brenda Sifontes',
            'email'     => 'brendasifontes1@gmail.com',
            'password'  =>  bcrypt('bsifontes'),
            'role'      =>  'editor'
        ]);
        DB::table('users')->insert([
            'name'      => 'Leacsy Sanchez',
            'email'     => 'leacsy.sanchez@hotmail.com',
            'password'  =>  bcrypt('lsanchez'),
            'role'      =>  'editor'
        ]);
    }
}
