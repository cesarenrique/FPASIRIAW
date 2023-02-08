<h1> LISTA DE EDITORIALES </h1>

<ul>
    <!--
        $editorial es un array de variables tipo editorial
        y tiene 4 características id,nomber,telefono y direccion
        Para acceder a estar características se usa
-->
@foreach ($editorial as $tipoeditorial)
<li>  {{$tipoeditorial->id}} - 
    <a href="editorial/{{$tipoeditorial->id}}">
        {{$tipoeditorial->NOMBRE}}
</a>
        - 
    {{$tipoeditorial->TELEFONO}} -
    {{$tipoeditorial->DIRECCION}}  
    

    <a href="/editorial/delete/{{$tipoeditorial->id}}">Eliminar </a>
</li>
@endforeach 
</ul>