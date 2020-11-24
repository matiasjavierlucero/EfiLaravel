@include('layouts.app')
<div class="container">
    <div class="row">
        <!-- Mensaje de Confirmacion -->
        @if (isset($Mensaje))
            <h1 class="text-center">{{$Mensaje}}</h1>                        
        @endif

           
        <!-- Formulario de Carga -->
        <div class="col-5">
            @if (isset($equipo) && is_object($equipo))
            <h1 class="text-center">{{$jugador->Nombre}}</h1>
                <div class="display-4 text-center mb-2" style="font-size: 1.5rem">Editar Jugador</div>
            @else
                <div class="display-4 text-center mb-2" style="font-size: 1.5rem">Nuevo Jugador</div>
            @endif
            <div class="card p-4">
            <form class="form" action="{{isset($equipo) ? action('Jugadores@update'):action('Jugadores@store')}}" method='POST'>
                    {{ csrf_field() }}
                    <!-- Si existe $equipo (variable a actualizar), creo un id oculto -->
                    @if (isset($equipo) && is_object($equipo))
                        <input type="text" class="form-control mb-4 d-none" name="id" value="{{$equipo->id}}">
                    @endif


                    <div class="label">Apellido del Jugador</div>
                    @if (isset($equipo) && is_object($equipo))
                        <input type="text" class="form-control mb-4" name="ApellidoJugador" value="{{$equipo->Nombre}}">
                    @else
                        <input type="text" class="form-control mb-4" name="ApellidoJugador" value="">
                    @endif
                    <div class="label">Nombre del Jugador</div>
                    @if (isset($equipo) && is_object($equipo))
                        <input type="text" class="form-control mb-4" name="NombreJugador" value="{{$equipo->Nombre}}">
                    @else
                        <input type="text" class="form-control mb-4" name="NombreJugador" value="">
                    @endif
                    
                    <div class="label">Localidad</div>
                    <select id="" class="form-control mb-4" name="LocalidadJugador">

                        @if (isset($equipo) && is_object($equipo))
                            <option value="{{$equipo->IdLocalidad}}">{{$equipo->NomLocalidad}}</option>
                        @endif

                        @foreach ($localidades as $localidad)
                            <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Equipo</div>
                    <select id="" class="form-control mb-4" name="EquipoJugador">

                        @if (isset($equipo) && is_object($equipo))
                            <option value="{{$equipo->IdCategoria}}">{{$equipo->NomCategoria}}</option>
                        @endif

                        @foreach ($equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->Nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Posición</div>
                    <select id="" class="form-control mb-4" name="PosicionJugador">

                        @if (isset($equipo) && is_object($equipo))
                            {{-- <option value="{{$equipo->IdCategoria}}">{{$equipo->NomCategoria}}</option> --}}
                        @endif

                        @foreach ($posiciones as $posicion)
                            <option value="{{$posicion->id}}">{{$posicion->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Dorsal</div>
                        @if (isset($jugador) && is_object($jugador))
                            <input type="text" class="form-control mb-4" name="ApellidoJugador" value="{{$equipo->Nombre}}">
                        @else
                            <input type="numeric" class="form-control mb-4" name="dorsal" value="">
                        @endif
                    <button type="submit" class="btn btn-outline-dark form-control">Guardar</button>
                </form>
            </div>
        </div>
        <!-- Listado de Equipos -->
        <div class="col-7">
            <div class="display-4 text-center mb-2" style="font-size: 1.4rem">Listado de Jugadores</div>
            <table class="table table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Localidad</th>
                        <th>Equipo</th>
                        <th>Posición</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $jugador)
                            <tr>
                                <td scope="row">{{$jugador->apellido}}</td>
                                <td scope="row">{{$jugador->nombre}}</td>
                                <td>{{$jugador->NomLocalidad}}</td>
                                <td>{{$jugador->NomEquipo}}</td>
                                <td>{{$jugador->NomPosicion}}</td>
                                <td>
                                    <a href="#"><button class="btn btn-secondary"  data-toggle="modal" data-target="#modalFoto"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="/jugador/editar/{{$jugador->id}}"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></i></button></a>
                                    <a href="#"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>