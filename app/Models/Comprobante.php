<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'comprobantes';

    protected $fillable = ['id_comprobantes','id_usuarios','id_juegos','estado_pago','ruta_comprobante'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juego()
    {
        return $this->hasOne('App\Models\Juego', 'id_juegos', 'id_juegos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id_usuarios', 'id_usuarios');
    }
    
}
