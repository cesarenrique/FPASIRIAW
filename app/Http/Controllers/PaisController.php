<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Provincia;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    //
    public function registrarForm(Request $request){
        return view('pais/paisRegistrarForm');
      }

      public function registrar(Request $request){
          $single=new Pais();
          $single->NOMBRE=$request->nombre;

          $single->save();
          return redirect('/pais/listar');


      }


      public function listar(){

          $todos=Pais::All();
          return view('pais/paisListar')->with('todos',$todos);
      }

      public function modificarForm(Request $request){
          $id=intval($request->id);
          $single=Pais::findOrFail($id);
          return view('pais/paisModificarForm')->with('single',$single);
      }

      public function modificar(Request $request){

            $id=intval($request->id);
            $single=Pais::findOrFail($id);
            $single->ID=$request->id;
            $single->NOMBRE=$request->nombre;
            $single->save();
            return redirect('/pais/listar');

      }


      public function borrar($id,Request $request){

          $id2=intval($id);
          $single=Pais::findOrFail($id2);
          $single->delete();
          return redirect('/pais/listar');
      }

}
