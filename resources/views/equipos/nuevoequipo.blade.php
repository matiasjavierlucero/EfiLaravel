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
            <h1 class="text-center">{{$equipo->Nombre}}</h1>
                <div class="display-4 text-center mb-2" style="font-size: 1.5rem">Editar Equipo</div>
            @else
                <div class="display-4 text-center mb-2" style="font-size: 1.5rem">Nuevo Equipo</div>
            @endif
            <div class="card p-4">
            <form class="form" action="{{isset($equipo) ? action('Equipos@update'):action('Equipos@store')}}" method='POST'>
                    {{ csrf_field() }}
                    <!-- Si existe $equipo (variable a actualizar), creo un id oculto -->
                    @if (isset($equipo) && is_object($equipo))
                        <input type="text" class="form-control mb-4 d-none" name="id" value="{{$equipo->id}}">
                    @endif
                    <div class="label">Nombre del Equipo</div>
                    
                    @if (isset($equipo) && is_object($equipo))
                        <input type="text" class="form-control mb-4" name="NombreEquipo" value="{{$equipo->Nombre}}">
                    @else
                        <input type="text" class="form-control mb-4" name="NombreEquipo" value="">
                    @endif
                    
                    <div class="label">Localidad</div>
                    <select id="" class="form-control mb-4" name="LocalidadEquipo">

                        @if (isset($equipo) && is_object($equipo))
                            <option value="{{$equipo->IdLocalidad}}">{{$equipo->NomLocalidad}}</option>
                        @endif

                        @foreach ($localidades as $localidad)
                            <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Categoria</div>
                    <select id="" class="form-control mb-4" name="CategoriaEquipo">

                        @if (isset($equipo) && is_object($equipo))
                            <option value="{{$equipo->IdCategoria}}">{{$equipo->NomCategoria}}</option>
                        @endif

                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->Nombre}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-dark form-control">Guardar</button>
                </form>
            </div>
        </div>
        <!-- Listado de Equipos -->
        <div class="col-7">
            <div class="display-4 text-center mb-2" style="font-size: 1.4rem">Listado de Equipos</div>
            <table class="table table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nombre</th>
                        <th>Localidad</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td scope="row">{{$equipo->Nombre}}</td>
                                <td>{{$equipo->NomLocalidad}}</td>
                                <td>{{$equipo->NomCategoria}}</td>
                                <td>
                                    <a href="#"><button class="btn btn-secondary"  data-toggle="modal" data-target="#modalFoto"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="/equipos/editar/{{$equipo->id}}"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></i></button></a>
                                    <a href="#"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>