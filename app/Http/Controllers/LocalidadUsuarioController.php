<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Localidad;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
class LocalidadUsuarioController extends Controller
{

  public function seleccionar(Request $request){
    $localidades=DB::table('LOCALIDAD')->orderBy('NOMBRE')->get();
    $provincias=[];
    $paises=[];
    foreach ($localidades as $fila) {
      // code...
      $provincia=Provincia::where('id',$fila->ID_PROVINCIA)->firstOrFail();
      $provincias[]=$provincia->NOMBRE;
      $pais=Pais::where('id',$provincia['ID_PAIS'])->firstOrFail();
      $paises[]=$pais->NOMBRE;
    }
    return view('localidadUsuario/localidadUsuarioSelecionar')->with('localidades',$localidades)
    ->with('provincias',$provincias)->with('paises',$paises);

  }


  public function seleccionado(Request $request){
    $id=$request->localidad;
    $url="/localidad/$id/usuario/listar";
    return redirect($url);
  }

  public function listar($id,Request $request){
      $id2=intval($id);
      $todos=Localidad::findOrFail($id2)->usuarios;
      //dd($todos);
      $localidades=[];
      $provincias=[];
      $paises=[];
      foreach ($todos as $fila) {

        $localidad=Localidad::where('id',$fila['ID_LOCALIDAD'])->firstOrFail();
        $localidades[]=$localidad->NOMBRE;
        $provincia=Provincia::where('id',$localidad['ID_PROVINCIA'])->firstOrFail();
        $provincias[]=$provincia->NOMBRE;
        $pais=Pais::where('id',$provincia['ID_PAIS'])->firstOrFail();
        $paises[]=$pais->NOMBRE;
      }
      return view('localidadUsuario/localidadUsuarioListar')->with('todos',$todos)->with('localidades',$localidades)
      ->with('provincias',$provincias)->with('paises',$paises);
  }
}
