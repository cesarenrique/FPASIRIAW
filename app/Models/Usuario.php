<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Localidad;
use App\Models\Ejemplar;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'USUARIO';
    protected $fillable = ['id','NOMBRE','APELLIDO','DNI','TELEFONO','ID_LOCALIDAD'];
    public $timestamps = false;

    public function localidad(){

        return $this->belongsTo(Localidad::class,'ID_LOCALIDAD');
    }
    public function multas()
    {
        return $this->hasMany(Usuario::class,'USUARIO');
    }
    public function ejemplares()
    {
       return $this->belongsToMany(Ejemplar::class,'PRESTAR','ID_USUARIO','ID_EJEMPLAR')->withPivot(['FECHA_PRESTAMO','FECHA_DEVOLUCION']); // autor_id ariiculo_id
    }
}