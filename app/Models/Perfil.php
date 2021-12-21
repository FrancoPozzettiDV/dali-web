<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "perfiles";

    //RELATIONSHIPS//
    
    public function User(){
        return $this->hasMany(User::class,"id_perfil");
    }
    
    public function Actividad(){
        return $this->hasMany(Actividad::class,"id_perfil");
    }
    
}
