@include('layouts.app')
<div class="container">
     <div class="row">
         <div class="col"></div>
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Listado de Jugadores del Futbol Argentino</b>
            </div>
        </div>
        <div class="col text-right">
            <a href="nuevojugador" class="btn btn-info">Gestionar Jugadores</a>
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
                        <td>{{$jugador->NomEquipo}}</td>
                        <td>{{$jugador->NomPosicion}}</td>
                        <td>{{$jugador->dorsal}}</td>
                        <td>{{$jugador->NomLocalidad}}</td>
                        <td>
                        <a href="{{$jugador->photo}}"><button class="btn btn-secondary"  data-toggle="modal" data-target="#modalFoto"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                        <a href="#"><button class="btn btn-info"><i class="fas fa-edit" style="color:white"></i></button></a>
                        <a href="/jugadores/delete/{{$jugador->id}}"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>                
    </div>
</div>

