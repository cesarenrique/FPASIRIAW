<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Localidad;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
class UsuarioController extends Controller
{
    //

    public function registrarForm(Request $request){
        $localidades=Localidad::orderBy('NOMBRE')->get();
        return view('usuario/usuarioRegistrarForm')->with('localidades',$localidades);
    }

    public function registrar(Request $request){
        if(isset($request->nombre) && isset($request->apellidos)){
          $single=new Usuario();
          $single->NOMBRE=$request->nombre;
          $single->APELLIDO=$request->apellidos;
          $single->DNI=$request->DNI;
          $single->TELEFONO=$request->telefono;
          $single->ID_LOCALIDAD=$request->localidad;
          $single->save();
          //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
          return redirect('/usuario/listar');
        }
        return redirect('/usuario/registrar');
    }


    public function listar(Request $request){

        $todos=Usuario::All();

        return view('usuario/usuarioListar')->with('todos',$todos);
    }
    public function modificarId($id,Request $request){
        $id2=intval($id);
        $usuario=Usuario::findOrFail($id2);
        $localidades=Localidad::orderBy('NOMBRE')->get();

        $selecionadas=[];

        foreach ($localidades as $fila) {
          // code..

          if($usuario->ID_LOCALIDAD==$fila->id){
              $selecionadas[]=true;
          }else{
              $selecionadas[]=false;
          }
        }

        return view('usuario/usuarioModificarForm')->with('usuario',$usuario)->with('localidades',$localidades)
        ->with('selecionadas',$selecionadas);
    }

    public function modificarForm(Request $request){
        $id=intval($request->id);
        $usuario=Usuario::findOrFail($id);
        $localidades=Localidad::orderBy('NOMBRE')->get();

        $selecionadas=[];

        foreach ($localidades as $fila) {
          // code..

          if($usuario->ID_LOCALIDAD==$fila->id){
              $selecionadas[]=true;
          }else{
              $selecionadas[]=false;
          }
        }

        return view('usuario/usuarioModificarForm')->with('usuario',$usuario)->with('localidades',$localidades)
        ->with('selecionadas',$selecionadas);
    }

    public function modificar(Request $request){
          $id=intval($request->id);
          $single=Usuario::findOrFail($id);
          $single->NOMBRE=$request->nombre;
          $single->APELLIDO=$request->apellidos;
          $single->DNI=$request->DNI;
          $single->TELEFONO=$request->telefono;
          $single->ID_LOCALIDAD=$request->localidad;
          $single->save();
          return redirect('/usuario/listar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $autor=Usuario::findOrFail($id2);
        $autor->delete();
        return redirect('/usuario/listar');
    }

    public function showOne($id, Request $request){
      $id2=intval($id);
      $single=Usuario::findOrFail($id2);
      return view('/usuario/usuarioShowOne')->with('single',$single);
    }
}
