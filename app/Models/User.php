<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "users";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'usuario',
        'password',
        'id_perfil',
        'id_externo',
        'auth_externo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //RELATIONSHIPS//

    public function Perfil(){
        return $this->belongsTo(Perfil::class,'id_perfil');
    }
    
    public function Publicacion(){
        return $this->hasMany(Publicacion::class,"id_usuario");
    }

    public function Comentario(){
        return $this->hasMany(Comentario::class,"id_usuario");
    }
	
	public function Turno(){
		return $this->hasMany(Turno::class,"id_usuario");
	}
	
	public function Profesional(){
		return $this->hasMany(Turno::class,"id_usuario_profesional");
	}
    
    //FUNCTIONS//
    
    public static function allWithPerfil(){
        $usuarios = DB::table("users")->join('perfiles','users.id_perfil','=','perfiles.id')->select('users.id','users.email','users.usuario','perfiles.categoria')->where('perfiles.categoria','!=','admin')->get();

        return $usuarios;
    }

    public static function findWithPerfil($id){
        $usuario = DB::table("users")->join('perfiles','users.id_perfil','=','perfiles.id')->select('users.id','users.nombre','users.apellido','users.telefono','users.email','users.usuario','perfiles.categoria')->where('users.id','=',$id)->first();

        return $usuario;
    }
	
	public static function getProfesionales(){
		$usuarios = DB::table("users")->select('users.id','users.email','users.nombre','users.apellido')->where('users.id_perfil',4)->get();
		
		return $usuarios;
	}

}
