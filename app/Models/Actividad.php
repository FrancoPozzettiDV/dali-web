<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Actividad extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "actividades";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nombre',
        'formato',
        'plano_linguistico',
        'rango_edad',
        'id_perfil',
        'id_drive',
    ];

    //RELATIONSHIPS//

    public function Perfil(){
        return $this->belongsTo(Perfil::class,'id_perfil');
    }

    //MUTATOR//
    
    public function setNombreAttribute($valor){
        $this->attributes["nombre"] = trim(ucfirst($valor));
    }

    //FUNCTIONS//

    public static function getIdDrive($id_actividad){
        $actividad = DB::table("actividades")->select('id_drive')->where('id',$id_actividad)->first();

        return $actividad->id_drive;
    }

    public static function getActividades($plano){
        $actividades = DB::table("actividades")->select('nombre','formato','plano_linguistico','rango_edad','id_drive')->where('id_perfil', 2)->where('plano_linguistico', $plano)->orderBy('id','desc')->get();
        
        return $actividades;
    }

    public static function getActividadesPremium(){
        $actividades = DB::table("actividades")->select('nombre','formato','plano_linguistico','rango_edad','id_drive')->where('id_perfil', 3)->orderBy('id','desc')->get();

        return $actividades;
    }
    
}
