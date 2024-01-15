<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidas';

    protected $fillable = ['id_partidas','id_juegos','id_usuarios','salon','fecha','hora_inicio','hora_fin','estado'];
	
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
