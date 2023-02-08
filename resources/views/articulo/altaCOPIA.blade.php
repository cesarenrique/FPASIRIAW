
<h1> ALTA DE ARTICULOS </h1>

<form action="/articuloalta" name="altarticulo" method="post">
@csrf 
<!-- Esto es obligatorio para que laravel reciba los campos en el request -->

ISBN DEL ARTICULO: <input type="text" name="isbnarticulo" />
<br />
DESCRIPCION DEL ARTICULO: <input type="number" name="descripcionarticulo" />

<br />
NOMBRE DEL ARTICULO: <input type="text" name="nombrearticulo" />
<br />
IDIOMA DEL ARTICULO: <input type="text" name="idiomaarticulo" />
<br />
<input type="submit" value="Dar de alta" />

</form>