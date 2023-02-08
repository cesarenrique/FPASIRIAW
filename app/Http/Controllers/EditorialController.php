<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editorial;
use App\Models\Pais;

class EditorialController extends Controller
{
     //Puedo crear funciones
    //Todas deben ser PUBLICAS

    //Funcion para unicamente mostrar el formulario de alta de editorial
    public function muestraform(){

    //Solamente llama a la vista del formulario sin
    //pasarle ninguna variable
      $paises=Pais::All();
        return view('editorial/alta',compact('paises'));
    }

    public function delete($id){

        $editorial = Editorial::findOrFail($id);

        $editorial->delete();

        return redirect('/editorial'); //Muestra el listado de editorial
    }


    public function editorialalta(Request $req){

        $editorialnueva = new Editorial ();
        $editorialnueva->NOMBRE = $req->nombreditorial;
        $editorialnueva->TELEFONO = $req->telefonoeditorial;
        $editorialnueva->DIRECCION = $req->direccioneditorial;
        $editorialnueva->ID_PAIS = $req->pais;
        $editorialnueva->save(); //Aqui hago el insert

        return redirect('/editorial',); //Muestra el listado de editorial
       }

    public function listaid($id){

        $editorial = Editorial::findOrfail($id);
        //select * from editorial where id=$id or die

        //Llamar a la vista show.blade.php de
        //directorio editorial de views con la variable $editorial

        return view('editorial/show', compact('editorial'));
    }
    public function listaeditorial(){
        //Aqui listaré las clases de editoriales y
        //se mostrarán en una vista

        //Creo la variable haciendo el select de la tabla
        //editorial
        $editorial = Editorial::get(); //<-esto hace el select


        //Indico primero el directorio que hay dentro
        //de views y luego el nombre del blade.php
        //SIN LAS EXTENSIONES .BLADE.PHP
        //Luego le paso las variables que quiero que imprima
        // en el HTML
        //return view('editorial/lista', 'editorial' => $editorial)
        return view('editorial/lista2', compact('editorial'));
    }
}
