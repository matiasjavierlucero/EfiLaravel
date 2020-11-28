<?php

use Illuminate\Database\Seeder;

class fechas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 1; $i<20; $i++){
            DB::table('fecha')->insert(array(
                'fecha'=>$i
            ));
        };
    }
}
