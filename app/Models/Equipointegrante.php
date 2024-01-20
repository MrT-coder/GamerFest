<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipointegrante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipointegrantes';

    protected $fillable = ['id_usu','id_equ','isLider'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equ');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usu');
    }
    
}
