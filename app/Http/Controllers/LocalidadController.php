<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
class LocalidadController extends Controller
{
    //

    public function registrarForm(Request $request){
        $todas=DB::table('PROVINCIA')->orderBy('NOMBRE')->get();

        $paises=[];
        foreach ($todas as $fila) {
          // code...
          $pais=Pais::where('id',$fila->ID_PAIS)->firstOrFail();
          $paises[]=$pais->NOMBRE;
        }
        return view('localidad/LocalidadregistrarForm')->with('todas',$todas)->with('paises',$paises);
    }

    public function registrar(Request $request){
        if(isset($request->nombre) && isset($request->cp) && isset($request->habitantes)){
          $single=new Localidad();
          $single->NOMBRE=$request->nombre;
          $single->CP=$request->cp;
          $single->N_HABITANTE=$request->habitantes;
          $single->ID_PROVINCIA=$request->provincia;
          $single->save();
          //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
          return redirect('/localidad/listar');
        }
        return redirect('/localidad/registrar');
    }


    public function listar(Request $request){

        $todos=Localidad::All();
        $provincias=[];
        $paises=[];
        foreach ($todos as $fila) {
          // code...
          $provincia=Provincia::where('id',$fila['ID_PROVINCIA'])->firstOrFail();
          $provincias[]=$provincia->NOMBRE;
          $pais=Pais::where('id',$provincia['ID_PAIS'])->firstOrFail();
          $paises[]=$pais->NOMBRE;
        }

        return view('localidad/Localidadlistar')->with('todos',$todos)->with('provincias',$provincias)
        ->with('paises',$paises);
    }

    public function modificarForm(Request $request){
        $id=intval($request->id);
        $localidad=Localidad::findOrFail($id);
        $provincias=DB::table('PROVINCIA')->orderBy('NOMBRE')->get();

        $paises=[];
        $selecionadas=[];
        foreach ($provincias as $fila) {
          // code...
          $pais=Pais::where('id',$fila->ID_PAIS)->firstOrFail();
          $paises[]=$pais->NOMBRE;

          if($localidad->ID_PROVINCIA == $fila->id){
            $selecionadas[]=true;
          }else{
            $selecionadas[]=false;
          }
        }
        return view('localidad/localidadModificarForm')->with('localidad',$localidad) ->with('provincias',$provincias)
        ->with('paises',$paises)->with('selecionadas',$selecionadas);
    }

    public function modificar(Request $request){
          $id=intval($request->id);
          $single=Localidad::findOrFail($id);
          $single->NOMBRE=$request->nombre;
          $single->CP=$request->cp;
          $single->N_HABITANTE=$request->habitantes;
          $single->ID_PROVINCIA=$request->provincia;
          $single->save();
          return redirect('/localidad/listar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $single=Localidad::findOrFail($id2);
        $single->delete();
        return redirect('/localidad/listar');
    }
}
