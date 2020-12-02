@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="col text-center">
        </div>
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Portal de {{$equipo->Nombre}}</b>
            </div>
        </div>
        <div class="col text-center">
            <div class="display-4 text-right" style="font-size: 1.5rem">
               <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                Agregar Jugador
                </button>
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

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Jugador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form class="form" action="/jugadores/guardarjugador" method='POST'>
                    {{ csrf_field() }}
                    <div class="label">Apellido del Jugador</div>
                    <input type="text" class="form-control mb-4" name="ApellidoJugador" value="">
     
                    <div class="label">Nombre del Jugador</div>
                    <input type="text" class="form-control mb-4" name="NombreJugador" value="">
                  
                    <div class="label">Localidad</div>
                    <select id="" class="form-control mb-4" name="LocalidadJugador">
                        @foreach ($localidades as $localidad)
                            <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Posición</div>
                    <select id="" class="form-control mb-4" name="PosicionJugador">
                        @foreach ($posiciones as $posicion)
                            <option value="{{$posicion->id}}">{{$posicion->nombre}}</option>
                        @endforeach
                    </select>
                    <input id="" class="form-control mb-4 d-none" name="EquipoJugador" placeholder="{{$equipo->id}}" value={{$equipo->id}}>
                    <div class="label">Dorsal</div>
                    <input type="numeric" class="form-control mb-4" name="dorsal" value="">
                    <button type="submit" class="btn btn-outline-dark form-control">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

