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
        return $this->hasOne('App\Models\Rol', 'id_rol', 'id_rol');
    }
    
}
