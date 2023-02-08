<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provincia;
use App\Models\Editorial;
class Pais extends Model
{
    use HasFactory;
    protected $table = 'PAIS';
    protected $fillable = ['id','NOMBRE'];
    public $timestamps = false;
    public function provincia(){

      return $this->hasMany(Provincia::class,'ID_PROVINCIA');
    }
    public function editoriales(){

      return $this->hasMany(Editorial::class,'ID_PAIS');
    }
}
