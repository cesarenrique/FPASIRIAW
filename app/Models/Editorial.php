<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
class Editorial extends Model
{
    use HasFactory;

    protected $table = 'editorial';
    protected $fillable = ['id','NOMBRE','TELEFONO','DIRECCION'];
    public $timestamps = false;

    public function autores(){
        return $this->belongsToMany(Autor::class,'CREAR','ID_EDITORIAL','ID_ARTICULO');
    }

    public function paises(){

      return $this->belongsTo(Editorial::class,'ID_PAIS');
    }
}
