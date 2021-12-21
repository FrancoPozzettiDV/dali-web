<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Turno extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "turnos";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'id_usuario',
        'paciente',
        'fecha',
        'desde',
        'hasta',
		'motivo',
		'id_usuario_profesional',
		'id_estado',
    ];

    // RELATIONSHIPS //

    public function User(){
        return $this->belongsTo(User::class,"id_usuario");
    }
	
	public function Profesional(){
        return $this->belongsTo(User::class,"id_usuario_profesional");
    }
    
    public function Estado(){
        return $this->belongsTo(Estado::class,"id_estado");
    }
	
	//MUTATOR//
    
    public function setFechaAttribute($valor){
        $this->attributes["fecha"] = date("Y-m-d", strtotime($valor));
    }
	
	//ACCESSOR//
	
	public function getFechaAttribute($valor){
		return date("d-m-Y", strtotime($valor));  
	}
	
	//FUNCTIONS//
	
	public static function getTurno($idUsuario){
		$turno = DB::table("turnos")->join('users','turnos.id_usuario_profesional','=','users.id')->select('turnos.id','turnos.id_usuario','turnos.paciente','turnos.fecha','turnos.desde','turnos.hasta','turnos.motivo','turnos.id_usuario_profesional','turnos.id_estado','users.nombre as nombreProfesional','users.apellido as apellidoProfesional')->where('turnos.id_usuario', $idUsuario)->where('turnos.id_estado', 1)->get();
		
		return $turno;
	}
	
	public static function getTurnosUsuario($idUsuario){
		$turnos = DB::table("turnos")->join('users','turnos.id_usuario_profesional','=','users.id')->select('turnos.id','turnos.id_usuario','turnos.paciente','turnos.fecha','turnos.desde','turnos.hasta','turnos.motivo','turnos.id_usuario_profesional','turnos.id_estado','users.nombre as nombreProfesional','users.apellido as apellidoProfesional')->where('turnos.id_usuario', $idUsuario)->get();
		
		return $turnos;
	}
	
	public static function getTurnosProfesional($idUsuario){
		$turnos = DB::table("turnos")->join('users','turnos.id_usuario','=','users.id')->select('turnos.id','turnos.paciente','turnos.fecha','turnos.desde','turnos.hasta','turnos.motivo','turnos.id_estado','users.telefono')->where('turnos.id_usuario_profesional', $idUsuario)->where('turnos.id_estado', 1)->get();
		
		return $turnos;
	}
}
