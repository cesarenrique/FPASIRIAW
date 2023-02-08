<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
class ProvinciaController extends Controller
{
    //
    public function registrarForm(Request $request){
        $todas=DB::table('PAIS')->orderBy('NOMBRE')->get();
        return view('provincia/ProvinciaregistrarForm')->with('todas',$todas);
      }

      public function registrar(Request $request){
          $single=new Provincia();
          $single->NOMBRE=$request->nombre;
          $single->ID_PAIS=$request->pais;
          $single->save();
          return redirect('/provincia/listar');


      }


      public function listar(){

          $todos=Provincia::All();
          return view('provincia/provinciaListar')->with('todos',$todos);
      }

      public function modificarForm(Request $request){
          $id=$request->id;
          $single=Provincia::findOrFail($id);
          $paises=DB::table('PAIS')->orderBy('NOMBRE')->get();
          foreach ($paises as $fila) {
            // code...


            if($single->ID_PAIS == $fila->id){
              $selecionadas[]=true;
            }else{
              $selecionadas[]=false;
            }
          }
          return view('provincia/provinciamodificarForm')->with('single',$single)->with('paises',$paises)->with('selecionadas',$selecionadas);
      }

      public function modificar(Request $request){

            $id=$request->id;
            $single=Provincia::findOrFail($id);
            $single->id=$request->id;
            $single->NOMBRE=$request->nombre;
            $single->ID_PAIS=$request->pais;
            $single->save();
            return redirect('/provincia/listar');

      }


      public function borrar($id,Request $request){

          $id2=intval($id);
          $single=Provincia::findOrFail($id2);
          $single->delete();
          return redirect('/provincia/listar');
      }

}
