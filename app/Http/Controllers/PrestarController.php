<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Articulo;
use App\Models\Tipo;
use App\Models\Ejemplar;
class PrestarController extends Controller
{
    //
    public function seleccionar(Request $request){
        $usuarios=DB::table('USUARIO')->orderBy('NOMBRE')->get();
        return view('usuarioEjemplar/usuarioEjemplarSeleccionar')->with('usuarios',$usuarios);
    }

    public function seleccionado(Request $request){
        $id=intval($request->usuario);
        $usuario=Usuario::findOrFail($id);
        $ejemplares= $usuario->ejemplares;
        $ejemplaresExcluidos= $ejemplares;
        $todos=[];
        $articulos=[];
        $tipos=[];
        $ejemplares2=Ejemplar::orderBy('ID_ARTICULO')->get();
        foreach ($ejemplares2 as $fila){

            $encontrado=false;
            foreach($ejemplaresExcluidos as $fila2){
                if($fila->id == $fila2->id){
                    $encontrado=true;
                }
            }
            if($encontrado==false){
               $todos[]=$fila;
            }
        }
        foreach ($ejemplares as $fila) {
            $articulo=Articulo::where('id',$fila->ID_ARTICULO)->firstOrFail();
            $articulos[]=$articulo->NOMBRE;
            $tipo=Tipo::where('id',$articulo['ID_TIPO'])->firstOrFail();
            $tipos[]=$tipo->TIPO;
        }
        return view('usuarioEjemplar/usuarioEjemplarListar')->with('usuario',$usuario)->with('ejemplares',$ejemplares)
        ->with('ejemplares2',$todos)->with('articulos',$articulos)->with('tipos',$tipos);
    }

    public function registrar(Request $request){
        $idUsuario=intval($request->usuario);
        $idEjemplar=$request->ejemplar;
        $usuario=Usuario::findOrFail($idUsuario);
        $myarray=['FECHA_PRESTAMO'=>$request->prestamo,'FECHA_DEVOLUCION'=>$request->devolucion];
        $usuario->ejemplares()->attach($idEjemplar,$myarray);
        $ejemplares= $usuario->ejemplares;
        $ejemplaresExcluidos= $ejemplares;
        $todos=[];
        $articulos=[];
        $tipos=[];

        $ejemplares2=Ejemplar::orderBy('ID_ARTICULO')->get();
        $articulos=[];
        foreach ($ejemplares2 as $fila){

            $encontrado=false;
            foreach($ejemplaresExcluidos as $fila2){
                if($fila->id == $fila2->id){
                    $encontrado=true;
                }
            }
            if($encontrado==false){
               $todos[]=$fila;
            }
        }

        foreach ($ejemplares as $fila) {
            $articulo=Articulo::where('id',$fila->ID_ARTICULO)->firstOrFail();
            $articulos[]=$articulo->NOMBRE;
            $tipo=Tipo::where('id',$articulo['ID_TIPO'])->firstOrFail();
            $tipos[]=$tipo->TIPO;
        }
        return view('usuarioEjemplar/usuarioEjemplarListar')->with('usuario',$usuario)->with('ejemplares',$ejemplares)
        ->with('ejemplares2',$todos)->with('articulos',$articulos)->with('tipos',$tipos);
   }

    public function borrar($usuario,$ejemplar,Request $request){
        $idUsuario=intval($usuario);
        $idEjemplar=$ejemplar;
        $usuario2=Usuario::findOrFail($idUsuario);
        $usuario2->articulos()->detach($idArticulo);
        $url="/autor/".$idAutor."/articulo/".$idArticulo;
        return redirect($url);
    }

    public function articuloPorAutor($usuario,$ejemplar,Request $request){
      $idUsuario=intval($usuario);
      $idEjemplar=$ejemplar;
      $usuario=Usuario::findOrFail($idUsuario);
      $ejemplares= $usuario->ejemplares;
      $ejemplaresExcluidos= $ejemplares;
      $todos=[];
      $articulos=[];
      $tipos=[];
      $ejemplares2=Ejemplar::orderBy('ID_ARTICULO')->get();
      foreach ($ejemplares2 as $fila){

          $encontrado=false;
          foreach($ejemplaresExcluidos as $fila2){
              if($fila->id == $fila2->id){
                  $encontrado=true;
              }
          }
          if($encontrado==false){
             $todos[]=$fila;
          }
      }
      foreach ($ejemplares as $fila) {
          $articulo=Articulo::where('id',$fila->ID_ARTICULO)->firstOrFail();
          $articulos[]=$articulo->NOMBRE;
          $tipo=Tipo::where('id',$articulo['ID_TIPO'])->firstOrFail();
          $tipos[]=$tipo->TIPO;
      }
      return view('usuarioEjemplar/usuarioEjemplarListar')->with('usuario',$usuario)->with('ejemplares',$ejemplares)
      ->with('ejemplares2',$todos)->with('articulos',$articulos)->with('tipos',$tipos);
    }
}
