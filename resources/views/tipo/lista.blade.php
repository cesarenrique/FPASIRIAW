<h1> LISTA DE TIPOS DE LIBROS </h1>

<ul>
    <!--
        $tipo es un array de variables tipo editorial
        y tiene 3 características id,tipo y descripcion
        Para acceder a estar características se usa
-->
@foreach ($tipo as $tipotipo)
<li>  {{$tipotipo->id}} - 
    <a href="tipo/{{$tipotipo->id}}">
        {{$tipotipo->TIPO}}
</a>
        - 
    {{$tipotipo->DESCRIPCION}} 

    <a href="/tipo/delete/{{$tipotipo->id}}">Eliminar </a>
</li>
@endforeach 
</ul>