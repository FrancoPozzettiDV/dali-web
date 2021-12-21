<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "estados";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'estado',
    ];

    //RELATIONSHIPS//
    
    public function Turno(){
        return $this->hasMany(Turno::class,"id_estado");
    }
}
