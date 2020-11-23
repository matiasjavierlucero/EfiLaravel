@include('layouts.app')

<div class="containter text-center">
    <div class="row" style="height: 400px">
        
        <div class="col">
            <div class="card" >
                <a href="/categorias/index" class="display-4 btn btn-dark" style="font-size: 1.3rem">
                    Categoria
                    <br>
                    <br>
                    <i class="fa fa-users" aria-hidden="true" style="font-size: 3.3rem"></i>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <a href="/equipos/index" class="display-4 btn btn-info" style="font-size: 1.3rem">
                    Equipos
                    <br>
                    <br>
                    <i class="fa fa-shield" aria-hidden="true" style="font-size: 3.3rem"></i>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <a href="/jugadores/index" class="display-4 btn btn-secondary" style="font-size: 1.3rem">
                    Jugadores
                    <br>
                    <br>
                    <i class="fa fa-users" aria-hidden="true" style="font-size: 3.3rem"></i>
                </a>
            </div>
        </div>
    </div>
</div>