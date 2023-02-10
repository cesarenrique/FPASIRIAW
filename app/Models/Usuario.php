<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Localidad;
use App\Models\Ejemplar;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $fillable = ['id','NOMBRE','APELLIDO','DNI','TELEFONO','ID_LOCALIDAD'];
    public $timestamps = false;

    public function localidad(){

        return $this->belongsTo(Localidad::class,'ID_LOCALIDAD');
    }
    public function multas()
    {
        return $this->hasMany(Usuario::class,'USUARIO');
    }

}
