<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comentario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "comentarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'mensaje',
        'fecha_creacion',
        'fecha_edicion',
        'id_publicacion',
        'id_usuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'bloqueado',
    ];

    //RELATIONSHIPS//
    
    public function Publicacion(){
        return $this->belongsTo(Publicacion::class,"id_publicacion");
    }
    public function User(){
        return $this->belongsTo(User::class,"id_usuario");
    }
    
    //FUNCTIONS//
    
    public static function getCantidadByPub($id_publicacion){
        $cantComms = DB::table("comentarios")->where('id_publicacion', $id_publicacion)->get()->count();
        
        return $cantComms;
    }

    public static function getComentariosByPub($id_publicacion){
        $comentarios = DB::table("comentarios")->join('users','comentarios.id_usuario','=','users.id')->select('comentarios.id','comentarios.mensaje','comentarios.fecha_creacion','comentarios.fecha_edicion','comentarios.id_publicacion','comentarios.id_usuario','comentarios.bloqueado','users.usuario','users.id_perfil')->where('comentarios.id_publicacion', $id_publicacion)->orderBy('comentarios.id','desc')->paginate(10);
        return $comentarios;
    }
}
