<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "categorias";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
    ];

    //RELATIONSHIPS//
    
    public function Publicacion(){
        return $this->hasMany(Publicacion::class,"id_publicacion");
    }

    //FUNCTION//
    
    public static function getDatos($id_categoria){
        $categoria = DB::table("categorias")->select('id','nombre')->where('id',$id_categoria)->first();

        return $categoria;
    }

    
    
}
