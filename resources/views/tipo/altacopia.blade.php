
<h1> ALTA DE TIPOS DE LIBROS </h1>

<form action="/tipoalta" name="altatipo" method="post">
@csrf 
<!-- Esto es obligatorio para que laravel reciba los campos en el request -->

TIPO DE LIBRO: <input type="text" name="tipotipo" />
<br />
DESCRIPCION DEL LIBRO: <input type="text" name="descripciontipo" />
<br />

<input type="submit" value="Dar de alta" />

</form>