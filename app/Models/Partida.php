<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidas';

    protected $fillable = ['id_juegos','id_usuarios','salon','fecha','hora_inicio','hora_fin','estado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juegos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidasusuarios()
    {
        return $this->hasMany('App\Models\Partidasusuario', 'id_partidas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }
    
}
