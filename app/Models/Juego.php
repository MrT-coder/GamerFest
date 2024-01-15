<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'juegos';

    protected $fillable = ['nombre','modalidad','costo','ruta_foto_principal','ruta_foto_portada','descripcion'];
	
}
