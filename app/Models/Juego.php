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
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comprobantes()
    {
        return $this->hasMany('App\Models\Comprobante', 'id_juegos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidas()
    {
        return $this->hasMany('App\Models\Partida', 'id_juegos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }

}
