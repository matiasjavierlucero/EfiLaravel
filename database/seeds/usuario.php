<?php

use Illuminate\Database\Seeder;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'name' => 'Santiago',
            'email' => 'santipalacios@gmail.com',
            'password' => bcrypt('laravel'), 
            ));
    }
}
