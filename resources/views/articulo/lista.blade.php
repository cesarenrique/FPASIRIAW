<h1> LISTA DE ARTICULOS </h1>

<ul>
    <!--
        $editorial es un array de variables tipo editorial
        y tiene 4 características id,nomber,telefono y direccion
        Para acceder a estar características se usa
-->
@foreach ($articulo as $tipoarticulo)
<li>  {{$tipoarticulo->id}} - 
    <a href="articulo/{{$tipoarticulo->id}}">
        {{$tipoarticulo->NOMBRE}}
</a>
        - 
    {{$tipoarticulo->IDIOMA}}  -
    {{$tipoarticulo->ISBN}}
    -
    {{$tipoarticulo->DESCRIPCION}}  
    -
    {{$tipoarticulo->editorial->NOMBRE}}  


    <a href="/articulo/delete/{{$tipoarticulo->id}}">Eliminar </a>
</li>
@endforeach 
</ul>