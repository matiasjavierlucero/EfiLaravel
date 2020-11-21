@include('includes.header')

<div class="container text-center">
    <div class="card">
        <ul>
            @foreach ($localidades as $localidad)
                <li style="list-style: none">{{$localidad->nombre}}</li>
            @endforeach
        </ul>
    </div>
</div>
