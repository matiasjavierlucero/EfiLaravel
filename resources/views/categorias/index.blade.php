@include('includes.header')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="display-4 text-center" style="font-size: 1.5rem">
               <b> Categorias del Fubol Argentino</b>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <br>
        @foreach ($categorias as $categoria)
        <div class="col">
        <a href="categoria/{{$categoria->id}}" class="card bg-dark text-center" style="height:50px;text-decoration: none;color:white" >
            <h5>
                {{$categoria->Nombre}}
            </h5>
        </a>
        </div>
        @endforeach
    </div>
</div>
