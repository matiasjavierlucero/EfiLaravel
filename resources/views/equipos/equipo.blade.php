@include('includes.header')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Portal de {{$equipo->Nombre}}</b>
            </div>
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Listado de Jugadores</b>
            </div>
        </div>
    </div>
     <div class="row">

        <table class="table table-hover table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Equipo</th>
                    <th>Posición</th>
                    <th>Dorsal</th>
                    <th>Localidad</th>
                    <th>Acciones</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($jugadores as $jugador)
                    <tr>
                        <td>{{$jugador->apellido}}</td>
                        <td>{{$jugador->nombre}}</td>
                        <td>{{$jugador->idEquipo}}</td>
                        <td>{{$jugador->apellido}}</td>
                        <td>{{$jugador->nombre}}</td>
                        <td>{{$jugador->idEquipo}}</td>
                        <td>
                            <a href="#"><button class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="#"><button class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            
                            <a href="#"><button class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>                
    </div>
</div>

