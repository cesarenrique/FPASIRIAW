<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;
class CrearController extends Controller
{
  public function seleccionar(Request $request){
      $autores=DB::table('AUTOR')->orderBy('NOMBRE')->get();
      return view('autorArticulo/AutorArticuloSeleccionar')->with('autores',$autores);
  }

  public function seleccionado(Request $request){
      $id=intval($request->autor);
      $autor=Autor::findOrFail($id);
      $articulos= $autor->articulos;
      $articulosExcluidos= $articulos;
      $todos=[];
      $articulos2=DB::table('ARTICULO')->orderBy('NOMBRE')->get();
      foreach ($articulos2 as $fila){
          $encontrado=false;
          foreach($articulosExcluidos as $fila2){
              if($fila->id == $fila2->id){
                  $encontrado=true;
              }
          }
          if($encontrado==false){
             $todos[]=$fila;
          }
      }
      return view('autorArticulo/lista2')->with('autor',$autor)->with('articulos',$articulos)->with('articulos2',$todos);
  }

  public function registrar(Request $request){
      $idAutor=intval($request->autor);
      $idArticulo=$request->articulo;
      $autor=Autor::findOrFail($idAutor);
      $autor->articulos()->attach($idArticulo,[]);
      $articulos= $autor->articulos;
      $articulosExcluidos= $articulos;
      $todos=[];
      $articulos2=DB::table('ARTICULO')->orderBy('NOMBRE')->get();
      foreach ($articulos2 as $fila){
          $encontrado=false;
          foreach($articulosExcluidos as $fila2){
              if($fila->id == $fila2->id){
                  $encontrado=true;
              }
          }
          if($encontrado==false){
             $todos[]=$fila;
          }
      }
      return view('autorArticulo/lista2')->with('autor',$autor)->with('articulos',$articulos)->with('articulos2',$todos);
  }

  public function borrar($autor,$articulo,Request $request){
      $idAutor=intval($autor);
      $idArticulo=$articulo;
      $autor2=Autor::findOrFail($idAutor);
      $autor2->articulos()->detach($idArticulo);
      $url="/autor/".$idAutor."/articulo/".$idArticulo;
      return redirect($url);
  }

  public function articuloPorAutor($autor,$articulo,Request $request){
      $idAutor=intval($autor);
      $idArticulo=$articulo;
      $autor2=Autor::findOrFail($idAutor);
      $articulos= $autor2->articulos;
      $articulosExcluidos= $articulos;
      $todos=[];
      $articulos2=DB::table('ARTICULO')->orderBy('NOMBRE')->get();
      foreach ($articulos2 as $fila){
          $encontrado=false;
          foreach($articulosExcluidos as $fila2){
              if($fila->id == $fila2->id){
                  $encontrado=true;
              }
          }
          if($encontrado==false){
             $todos[]=$fila;
          }
      }
      return view('autorArticulo/lista2')->with('autor',$autor2)->with('articulos',$articulos)->with('articulos2',$todos);
  }


}
