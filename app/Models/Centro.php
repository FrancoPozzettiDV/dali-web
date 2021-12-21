<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Centro extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "centros";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'web',
        'latitud',
        'longitud',
    ];

    //FUNCTION//
    
    public static function coordenadas(){
        $coordenadas = DB::table("centros")->select('latitud','longitud')->get()->toJson();

        return $coordenadas;
    }

}
