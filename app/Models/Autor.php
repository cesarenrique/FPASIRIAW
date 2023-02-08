<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'AUTOR';
    protected $fillable = ['id','NOMBRE','APELLIDO'];
    public $timestamps = false;

    public function articulos()
    {
       return $this->belongsToMany('App\Models\Articulo','CREAR','ID_AUTOR','ID_ARTICULO'); // autor_id ariiculo_id
    }
}
