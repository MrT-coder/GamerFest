<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ingresos';

    protected $fillable = ['Detalle','Valor','Fecha'];

	
}
