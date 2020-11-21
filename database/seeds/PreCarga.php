<?php

use Illuminate\Database\Seeder;

class PreCarga extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i = 0; $i<20; $i++){
            DB::table('localidad')->insert(array(
                'nombre'=>'Localidad'.$i
            ));
        };
        $posiciones=['Arquero','Defensor','Mediocampista','Delantero'];

        foreach ($posiciones as $posicion) {
            DB::table('posicion')->insert(array(
                'nombre'=>$posicion
            ));
        };

        $categorias=["Primera","Primera Nacional","Primera B Metropolitana","Federal A","Federal B","Federal C"];
     

        foreach ($categorias as $categoria) {
            DB::table('categoria')->insert(array(
                'nombre'=>$categoria
            ));
        };

        $this->command->info('La Tabla Localidad de Relleno Correctamente');
    }
}
