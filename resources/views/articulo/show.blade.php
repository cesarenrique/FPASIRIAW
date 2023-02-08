<h1> DATOS DEL ARTICULO</h1>

ID:
{{$articulo->id}}
<br />
NOMBRE:
{{$articulo->NOMBRE}}
<br />
ISBN:
{{$articulo->ISBN}}
<br />
DESCRIPCION:
{{$articulo->DESCRIPCION}}
<br />
IDIOMA:
{{$articulo->IDIOMA}}
<br />
NOMBRE DE LA EDITORIAL:
{{$articulo->editorial->NOMBRE}}
<br />
TIPO DE ARTICULO:
{{$articulo->tipo->TIPO}}

<hr />