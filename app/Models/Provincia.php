<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Localidad;
use App\Models\Pais;
class Provincia extends Model
{
    use HasFactory;
    protected $table = 'PROVINCIA';
    protected $fillable = ['id','NOMBRE','ID_PAIS'];
    public $timestamps = false;

    public function localidad(){

      return $this->hasMany(Localidad::class,'ID_LOCALIDAD');
    }

    public function pais(){

      return $this->belongsTo(Pais::class,'ID_PAIS');
    }
}
