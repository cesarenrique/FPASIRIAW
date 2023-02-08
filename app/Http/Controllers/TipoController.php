<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipo;

class TipoController extends Controller
{
    ////Puedo crear funciones
    //Todas deben ser PUBLICAS

    //Funcion para unicamente mostrar el formulario de alta de tipo
    public function muestraform(){

        //Solamente llama a la vista del formulario sin
        //pasarle ninguna variable
            return view('tipo/alta');
        }

        public function delete($id){

            $tipo = Tipo::findOrFail($id);

            $tipo->delete();

            return redirect('/tipo'); //Muestra el listado de tipo
        }


        public function tipoalta(Request $req){

            $tiponueva = new Tipo ();
            $tiponueva->TIPO = $req->tipotipo;
            $tiponueva->DESCRIPCION = $req->descripciontipo;


            $tiponueva->save(); //Aqui hago el insert

            return redirect('/tipo'); //Muestra el listado de tipo
           }

        public function listaid($id){

            $tipo = Tipo::findOrfail($id);
            //select * from tipo where id=$id or die

            //Llamar a la vista show.blade.php de
            //directorio editorial de views con la variable $editorial

            return view('tipo/show', compact('tipo'));
        }
        public function listatipo(){
            //Aqui listaré las clases de editoriales y
            //se mostrarán en una vista

            //Creo la variable haciendo el select de la tabla
            //editorial
            $tipo = Tipo::get(); //<-esto hace el select


            //Indico primero el directorio que hay dentro
            //de views y luego el nombre del blade.php
            //SIN LAS EXTENSIONES .BLADE.PHP
            //Luego le paso las variables que quiero que imprima
            // en el HTML
            //return view('tipo/lista'), 'tipo' => $tipo)
            return view('tipo/lista2', compact('tipo'));
        }
    }
