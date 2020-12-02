@include('layouts.app')

<div class="containter text-center m-2">
    <div class="row" style="height: 400px">
        
        <div class="col">
            <div class="card" >
                <a href="/categorias/index" class="display-4 btn btn-secondary" id="cat" style="font-size: 1.3rem">
                    Categorias
                    <br>    
                    <br>
                    <img src="{{ asset('images/categoria.png') }}" alt="" style="width: 80%">
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <a href="/equipos/index" class="display-4 btn btn-info" style="font-size: 1.3rem">
                    Equipos
                    <br>
                    <br>
                   <img src="{{ asset('images/escudo.png') }}" alt="" style="width: 80%">
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <a href="/jugadores/index" class="display-4 btn btn-success" style="font-size: 1.3rem">
                    Jugadores
                    <br>
                    <br>
                    <img src="{{ asset('images/2112176.png') }}" alt="" style="width: 80%">
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <a href="/fixture/categoria/1/fecha/1" class="display-4 btn btn-warning" style="font-size: 1.3rem">
                    Fixture
                    <br>
                    <br>
                    <img src="{{ asset('images/versus.png') }}" alt="" style="width: 80%">
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .card>a:hover{
        background-color:rgb(136, 184, 180);
        border-radius: 7%;
        border-color: transparent;
        transition: background-color .5s;
    }
</style>

@include('includes.footer')