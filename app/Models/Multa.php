<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Multa extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'multa';
    protected $fillable = ['id','DIA','USUARIO'];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'USUARIO');
    }
}
