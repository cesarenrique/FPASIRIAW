<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Multa;
class MultaController extends Controller
{
    //
    public function registrarForm(Request $request){
        $todos=Usuario::orderBy('Nombre')->get();
        return view('multa/multaRegistrarForm')->with('todos',$todos);
    }

    public function registrar(Request $request){
        if(isset($request->dia) && isset($request->usuario)){
          $single=new Multa();
          $single->DIA=$request->dia;
          $single->USUARIO=$request->usuario;
          $single->save();
          //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
          return redirect('/multa/listar');
        }
        return redirect('/multa/registrar');
    }


    public function listar(Request $request){

        $todos=Multa::All();
        return view('multa/multaListar')->with('todos',$todos);
    }

    public function modificarForm(Request $request){
        $id=intval($request->id);
        $single=Multa::findOrFail($id);
        $todos=Usuario::orderBy('NOMBRE')->get();
        $selecionadas=[];
        foreach ($todos as $fila) {
          // code...

          if($single->USUARIO == $fila->id){
            $selecionadas[]=true;
          }else{
            $selecionadas[]=false;
          }
        }
        return view('multa/multaModificarForm')->with('single',$single)
          ->with('todos',$todos)->with('selecionadas',$selecionadas);;
    }

    public function modificar(Request $request){
          $id=intval($request->id);
          $single=Multa::findOrFail($id);
          $single->DIA=$request->dia;
          $single->USUARIO=$request->usuario;
          $single->save();
          return redirect('/multa/listar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $autor=Multa::findOrFail($id2);
        $autor->delete();
        return redirect('/multa/listar');
    }
}
