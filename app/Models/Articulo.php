<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
     //Especifico que tabla de la BBDD es la que consultará este modelo
     protected $table ="articulo";
     protected $fillable=['ISBN','DESCRIPCION','NOMBRE','IDIOMA','ID_TIPO','ID_EDITORIAL'];
     public $timestamps = false;
     public function autores(){
        return $this->belongsToMany('App\Models\Autor','crear','ID_ARTICULO','ID_AUTOR'); // autor_id ariiculo_id
     }

     public function editorial(){
       return $this->belongsTo('App\Models\Editorial','ID_EDITORIAL');
     }

     public function tipo(){
       return $this->belongsTo('App\Models\Tipo','ID_TIPO');
     }

     public function ejemplares(){
       return $this->hasMany('App\Models\Ejemplar','ID_ARTICULO');
     }


}
