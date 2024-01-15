<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidasusuario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidasusuarios';

    protected $fillable = ['id_partidasusuarios','id_partidas','id_usuarios','gana'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partida()
    {
        return $this->hasOne('App\Models\Partida', 'id_partidas', 'id_partidas');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id_usuarios', 'id_usuarios');
    }
    
}
