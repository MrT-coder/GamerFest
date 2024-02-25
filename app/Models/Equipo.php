<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipos';

    protected $fillable = ['nombre_equ'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipointegrantes()
    {
        return $this->hasMany('App\Models\Equipointegrante', 'id_equ', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }
}
