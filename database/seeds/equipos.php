<?php

use Illuminate\Database\Seeder;

class equipos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equiposPrimera=['Boca Juniors','River Plate','Independiente','Racing','Velez Sarsfield', 'Talleres (Cba)'];
        $equiposNacional=['Tigre','Estudiantes (Rio IV)','Belgrano (Cba)','Lautaro Roncedo','Agropecuario','San Martin (T)'];
        
        foreach ($equiposPrimera as $equipo) {
            DB::table('equipo')->insert(array(
                'nombre'=>$equipo,
                'idLocalidad'=>'1',
                'idCategoria'=>'1'
            ));
        };
        foreach ($equiposNacional as $equipo) {
            DB::table('equipo')->insert(array(
                'nombre'=>$equipo,
                'idLocalidad'=>'1',
                'idCategoria'=>'2'
            ));
        };
    }
}
