<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'usuarios';

    protected $fillable = ['id_rol','nombre','apellido','telefono','universidad','carrera','semestre','email','pass','activo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function partidasusuarios()
    {
        return $this->hasMany('App\Models\Partidasusuario', 'id_usuarios', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function partidas()
    {
        return $this->hasMany('App\Models\Partida', 'id_usuarios', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function comprobantes()
    {
        return $this->hasMany('App\Models\Comprobante', 'id_usuarios', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipointegrantes()
    {
        return $this->hasMany('App\Models\Equipointegrante', 'id_usu', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juegos');
    }
}
