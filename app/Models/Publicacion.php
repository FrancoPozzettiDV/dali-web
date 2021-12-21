<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publicacion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "publicaciones";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'fecha',
        'id_categoria',
        'id_usuario',
    ];

    // RELATIONSHIPS //

    public function User(){
        return $this->belongsTo(User::class,"id_usuario");
    }
    
    public function Categoria(){
        return $this->belongsTo(Categoria::class,"id_categoria");
    }
    
    public function Comentario(){
        return $this->hasMany(Comentario::class,"id_publicacion");
    }

    //MUTATORS//
    
    public function setNombreAttribute($valor){
        $this->attributes["nombre"] = trim(ucfirst($valor));
    }

    public function setDescripcionAttribute($valor){
        $this->attributes["descripcion"] = trim($valor);
    }
    
    //FUNCTIONS//
    
    public static function getLastPub($id_categoria){
        $lastPub = DB::table("publicaciones")->select('id','nombre')->where('id_categoria', $id_categoria)->orderBy('id','desc')->limit(1)->first();
        
        return $lastPub;
    }

    public static function getCountPubs($id_categoria){
        $cantPubs = DB::table("publicaciones")->where('id_categoria', $id_categoria)->get()->count();
        
        return $cantPubs;
    }

    public static function getAll($id_categoria){
        $allPubs = DB::table("publicaciones")->join('users','publicaciones.id_usuario','=','users.id')->select('publicaciones.id','publicaciones.nombre','publicaciones.fecha','publicaciones.id_usuario','users.usuario','users.id_perfil')->where('publicaciones.id_categoria', $id_categoria)->orderBy('publicaciones.id','desc')->get();
        
        return $allPubs;
    }

    public static function getDatos($id_publicacion){
        $data = DB::table("publicaciones")->join('users','publicaciones.id_usuario','=','users.id')->select('publicaciones.id','publicaciones.nombre','publicaciones.descripcion','publicaciones.fecha','publicaciones.id_usuario','publicaciones.id_categoria','users.usuario','users.id_perfil')->where('publicaciones.id', $id_publicacion)->first();
        
        return $data;
    }
    
}
