<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Editorial;
use App\Models\Tipo;
class ArticuloController extends Controller
{
    //Puedo crear funciones
    //Todas deben ser PUBLICAS

    //Funcion para unicamente mostrar el formulario de alta de articulo
    public function muestraform(){

        //Solamente llama a la vista del formulario sin
        //pasarle ninguna variable
        $tipos=Tipo::All();
        $editoriales=Editorial::All();
            return view('articulo/alta',compact(['editoriales','tipos']));
        }

        public function delete($id){

            $articulo = Articulo::findOrFail($id);

            $articulo->delete();

            return redirect('/articulo'); //Muestra el listado de editorial
        }


        public function articuloalta(Request $req){

            $articulonueva = new articulo ();
            $articulonueva->ISBN = $req->isbnarticulo;
            $articulonueva->DESCRIPCION = $req->descripcionarticulo;
            $articulonueva->NOMBRE = $req->nombrearticulo;
            $articulonueva->IDIOMA = $req->idiomaarticulo;
            $articulonueva->ID_TIPO = $req->tipo;
            $articulonueva->ID_EDITORIAL = $req->editorial;
            $articulonueva->save(); //Aqui hago el insert

            return redirect('/articulo'); //Muestra el listado de articulo
           }

        public function listaid($id){

            $articulo = Articulo::findOrfail($id);
            //select * from articulo where id=$id or die

            //Llamar a la vista show.blade.php de
            //directorio articulo de views con la variable $editorial

            return view('articulo/show', compact('articulo'));
        }
        public function listarticulo(){
            //Aqui listaré las clases de editoriales y
            //se mostrarán en una vista

            //Creo la variable haciendo el select de la tabla
            //editorial
            $articulo = Articulo::get(); //<-esto hace el select


            //Indico primero el directorio que hay dentro
            //de views y luego el nombre del blade.php
            //SIN LAS EXTENSIONES .BLADE.PHP
            //Luego le paso las variables que quiero que imprima
            // en el HTML
            //return view('editorial/lista', 'editorial' => $editorial)
            return view('articulo/lista2', compact('articulo'));
        }
}
