@include('layouts.app')
<div class="container">
    <div class="row">
       <div class="col mb-4 text-center">
       @if (isset($categoria) && is_object($categoria))
            <h3>Fixture de la {{$categoria->Nombre}}</h3>
        @else
            <h3>Fixture </h3>
        @endif
       </div>   
    </div>
    <div class="row mb-2">
         @foreach ($categorias as $categoria)
        <div class="col">
            <a href="/fixture/categoria/{{$categoria->id}}" class="card bg-dark text-center" style="height:50px;text-decoration: none;color:white" >
                <h5 class="m-0">
                    {{$categoria->Nombre}}
                </h5>
            </a>
        </div>
        @endforeach    
    </div>
    <div class="row mt-4">
      <div class="col">
      <h5 class="text-center mb-1"> Cargar Partido </h5>
      <form action="{{action('FixtureController@store')}}" method='POST'>
            {{ csrf_field() }}
            <div class="row text-center">
                @if (isset($idFecha))
                 <input type="text" class="d-none" value="{{$idFecha}}" name="fecha">
                @endif
               @if (isset($categoria) && is_object($categoria))
                <input type="text" class="d-none" value="{{$idCategoria}}" name="categoria">
                @endif
                <div class="col">
                    <select class="form-control" name="local">
                        @if (isset($equipos) && is_object($equipos))
                            @foreach ($equipos as $equipo)
                                <option value="{{$equipo->id}}">{{$equipo->Nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col">
                    <p>VS</p>
                </div>
                <div class="col">
                    <select class="form-control" name="visitante">
                         @if (isset($equipos) && is_object($equipos))
                            @foreach ($equipos as $equipo)
                                <option value="{{$equipo->id}}">{{$equipo->Nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>              
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">
                        Cargar
                    </button>
                </div>
            </div>
            </form>
        </div>

    <div class="col">
        <div class="row">
            <h5>Fecha</h5>
            <div class="col d-flex justify-content-between mb-2">
                @if (isset($fecha) && is_object($fecha))
                    @foreach ($fecha as $fechan)
                    <a href="/fixture/categoria/{{$idCategoria}}/fecha/{{$fechan->id}}">{{$fechan->fecha}}</a>
                    @endforeach
                @endif
            </div>
        </div>
         <div class="card mt-1">
              @if (isset($idFecha))
                 <h5 class="text-center mt-3">Fecha {{$idFecha}}</h5>
                @endif
            <div class="card-body text-center">
                @if (isset($fixture) && is_object($fixture))
                    @foreach ($fixture as $fixt)
                        <div class="card text-center m-1">
                            <h5><b>{{$fixt->Nombre}}</b> vs <b>{{$fixt->Nombre}}</b></h5>        
                        </div>
                    @endforeach
                @endif
            </div>
         </div>
        </div>
        

    </div>
</div>