<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'egresos';

    protected $fillable = ['Detalle','Valor','Fecha'];
	
}
