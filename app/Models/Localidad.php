<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Provincia;
class Localidad extends Model
{
    use HasFactory;

    protected $table = 'LOCALIDAD';
    protected $fillable = ['id','NOMBRE','CP','N_HABITANTE','ID_PROVINCIA'];
    public $timestamps = false;

    public function usuarios(){
       return $this->hasMany('App\Models\Usuario','ID_LOCALIDAD');
    }

    public function provincia(){

      return $this->belongsTo(Provincia::class,'ID_PROVINCIA');
    }
}
