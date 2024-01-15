<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipointegrante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipointegrantes';

    protected $fillable = ['id_equ_int','id_usu','id_equ','isLider'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id_equ', 'id_equ');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'id', 'id_usu');
    }
    
}
