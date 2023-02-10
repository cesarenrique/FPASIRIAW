<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo;
use App\Models\Usuario;
class Ejemplar extends Model
{
    use HasFactory;
    protected $table = 'EJEMPLAR';
    protected $fillable = ['id','ESTANTERIA','LOCALIZACION','ID_ARTICULO'];
    public $timestamps = false;
    public function articulo()
    {
        return $this->belongsTo(Articulo::class,'ID_ARTICULO');
    }
    public function usuarios()
    {
       return $this->belongsToMany(Usuario::class,'PRESTAR','ID_EJEMPLAR','ID_USUARIO')->withPivot(['FECHA_PRESTAMO','FECHA_DEVOLUCION']); // autor_id ariiculo_id
    }
}
