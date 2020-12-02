@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="col text-center">
        </div>
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Portal de {{$categoria->Nombre}}</b>
            </div>
        </div>
        <div class="col text-right">
            <div class="display-4 text-right" style="font-size: 1.5rem">
             <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                 Agregar Equipo
            </button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <br>  
        @foreach ($equipos as $equipo)
        <div class="col-3 mb-2">
                <a href="/equipos/equipo/{{$equipo->id}}" class="card bg-dark text-center" style="height:50px;text-decoration: none;color:white" >
                    <h5>
                    {{$equipo->Nombre}}
                    </h5>
                </a>
                </div>
        @endforeach
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
               <form class="form" action="/equipos/guardarequipo" method='POST'>
                    {{ csrf_field() }}
                    <!-- Si existe $equipo (variable a actualizar), creo un id oculto -->
                    <div class="label">Nombre del Equipo</div>
                    <input type="text" class="form-control mb-4" name="NombreEquipo" value="">
                    <div class="label">Localidad</div>
                    <select id="" class="form-control mb-4" name="LocalidadEquipo">
                        @foreach ($localidades as $localidad)
                            <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="label">Categoria</div>
                    <input id="" class="form-control mb-4 d-none" name="CategoriaEquipo" value={{$categoria->id}}>
                    <button type="submit" class="btn btn-outline-dark form-control">Guardar</button>
                </form>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>















