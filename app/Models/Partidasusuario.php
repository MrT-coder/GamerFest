<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidasusuario extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'partidasusuarios';

    protected $fillable = ['id_partidas', 'id_usuarios', 'gana'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partida()
    {
        return $this->belongsTo(Partida::class, 'id_partidas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }
}
