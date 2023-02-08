
<h1> ALTA DE EDITORIALES </h1>

<form action="/editorialalta" name="altaeditorial" method="post">
@csrf 
<!-- Esto es obligatorio para que laravel reciba los campos en el request -->

NOMBRE DE EDITORIAL: <input type="text" name="nombreditorial" />
<br />
TELEFONO DE LA EDITORIAL: <input type="number" name="telefonoeditorial" />

<br />
DIRECCION DE LA EDITORIAL: <input type="text" name="direccioneditorial" />

<br />
<input type="submit" value="Dar de alta" />

</form>