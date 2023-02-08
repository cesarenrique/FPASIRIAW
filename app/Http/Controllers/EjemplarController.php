<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejemplar;
use App\Models\Articulo;
use App\Models\Tipo;
class EjemplarController extends Controller
{
    //

    public function registrarForm(Request $request){
          $todos=Articulo::All();
          return view('ejemplar/ejemplarRegistrarForm')->with('todos',$todos);
    }

    public function registrar(Request $request){
        if(isset($request->estanteria) && isset($request->localizacion)){
            $single=new Ejemplar();
            $single->ESTANTERIA=$request->estanteria;
            $single->LOCALIZACION=$request->localizacion;
            $single->ID_ARTICULO=$request->articulo;
            $single->save();
            //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
            return redirect('/ejemplar/listar');
        }
        return redirect('/ejemplar/registrar');
    }


    public function listar(Request $request){

        $todos=Ejemplar::All();
        $articulos=[];
        $tipos=[];
        foreach ($todos as $fila) {
            $articulo=Articulo::where('id',$fila->ID_ARTICULO)->firstOrFail();
            $articulos[]=$articulo->NOMBRE;
            $tipo=Tipo::where('id',$articulo['ID_TIPO'])->firstOrFail();
            $tipos[]=$tipo->TIPO;
        }
        return view('ejemplar/ejemplarListar')->with('todos',$todos)->with('articulos',$articulos)->with('tipos',$tipos);
    }

    public function modificarForm(Request $request){
          $id=intval($request->id);
          $single=Ejemplar::findOrFail($id);
          $todos=Articulo::All();
          $selecionadas=[];
          foreach ($todos as $fila) {
            // code...
            if($single->ID_ARTICULO==$fila->id){
                $selecionadas[]=true;
            }else{
                $selecionadas[]=false;
            }
          }
          return view('ejemplar/ejemplarModificarForm')->with('single',$single)->with('todos',$todos)->with('selecionadas',$selecionadas);
    }

    public function modificar(Request $request){
          $id=intval($request->id);
          $single=Ejemplar::findOrFail($id);
          $single->ESTANTERIA=$request->estanteria;
          $single->LOCALIZACION=$request->localizacion;
          $single->ID_ARTICULO=$request->articulo;
          $single->save();
          return redirect('/ejemplar/listar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $single=Ejemplar::findOrFail($id2);
        $single->delete();
        return redirect('/ejemplar/listar');
    }
}
