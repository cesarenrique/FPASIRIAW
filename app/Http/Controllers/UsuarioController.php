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
        return view('usuario/usuarioRegistrarForm')->with('localidades',$localidades)
        ->with('provincias',$provincias)->with('paises',$paises);
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
        return view('usuario/usuarioListar')->with('todos',$todos)->with('localidades',$localidades)
        ->with('provincias',$provincias)->with('paises',$paises);
    }

    public function modificarForm(Request $request){
        $id=intval($request->id);
        $usuario=Usuario::findOrFail($id);
        $localidades=DB::table('LOCALIDAD')->orderBy('NOMBRE')->get();
        $provincias=[];
        $paises=[];
        $selecionadas=[];

        foreach ($localidades as $fila) {
          // code..
          $provincia=Provincia::where('id',$fila->ID_PROVINCIA)->firstOrFail();
          $provincias[]=$provincia->NOMBRE;
          $pais=Pais::where('id',$provincia['ID_PAIS'])->firstOrFail();
          $paises[]=$pais->NOMBRE;
          if($usuario->ID_LOCALIDAD==$fila->id){
              $selecionadas[]=true;
          }else{
              $selecionadas[]=false;
          }
        }

        return view('usuario/usuarioModificarForm')->with('usuario',$usuario)->with('localidades',$localidades)
        ->with('provincias',$provincias)->with('paises',$paises)->with('selecionadas',$selecionadas);
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
}
