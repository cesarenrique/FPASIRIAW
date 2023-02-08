<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Ejemplar;
class AutorController extends Controller
{
    //
    public function registrarForm(Request $request){
        return view('autor/autorRegistrarForm');
    }

    public function registrar(Request $request){
        if(isset($request->nombre) && isset($request->apellidos)){
          $single=new Autor();
          $single->NOMBRE=$request->nombre;
          $single->APELLIDO=$request->apellidos;
          $single->save();
          //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
          return redirect('/autor/listar');
        }
        return redirect('/autor/registrar');
    }


    public function listar(Request $request){

        $todosAutores=Autor::All();
        return view('autor/autorListar')->with('todosAutores',$todosAutores);
    }

    public function modificarForm(Request $request){
        $id=intval($request->id);
        $autor=Autor::findOrFail($id);
        return view('autor/autorModificarForm')->with('autor',$autor);
    }

    public function modificar(Request $request){
          $id=intval($request->id);
          $autor=Autor::findOrFail($id);
          $autor->NOMBRE=$request->nombre;
          $autor->APELLIDO=$request->apellidos;
          $autor->save();
          return redirect('/autor/listar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $autor=Autor::findOrFail($id2);
        $autor->delete();
        return redirect('/autor/listar');
    }
}
