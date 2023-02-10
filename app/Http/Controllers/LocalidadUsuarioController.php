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
    $localidades=Localidad::orderBy('NOMBRE')->get();
    return view('localidadUsuario/localidadUsuarioSelecionar')->with('localidades',$localidades);

  }


  public function seleccionado(Request $request){
    $id=$request->localidad;
    $localidad=Localidad::findOrFail($id);
    $url="/localidad/$id/usuario/listar";
    return redirect($url);
  }

  public function listar($id,Request $request){
      $id2=intval($id);
      $todos=Localidad::findOrFail($id2)->usuarios;
      $localidades=Localidad::orderBy('NOMBRE')->get();
      return view('localidadUsuario/localidadUsuarioListar')->with('localidad',$localidad)->with('todos',$todos)->with('localidades',$localidades);

  }
}
