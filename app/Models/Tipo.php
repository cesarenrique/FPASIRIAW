<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipo';
    protected $fillable = ['id','TIPO','DESCRIPCION'.'ID_TIPO'];
    public $timestamps = false;

    public function articulo()
    {
        return $this->hasMany('App\Models\articulo','ID_TIPO');
    }
    //como la clase marcas esta asociada a la tabla tipo,
    //cada objeto o variable que sea una marca tendrá
    //los campos que tiene la tabla de la bd
    //id,tipo y descripcion


}
