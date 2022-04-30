<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Centro;
use App\Models\Categoria;
use App\Models\Publicacion;
use App\Models\Comentario;

class ViewController extends Controller
{
    
    public function index(){
        return view('dali.index');
    }
	
	public function parents(){
		return view('dali.infoPadres');
	}
	
	public function teachers(){
		return view('dali.infoDocentes');
	}
	
	public function professionals(){
		return view('dali.infoProfesionales');
	}
    
    public function register(){
        return view('dali.registro');
    }
    
    public function login(){
        return view('dali.login');
    }

    public function userForgot(){
        return view('dali.forgot_password');
    }

    public function userReset($token){
        return view('dali.reset_password')->with(["token" => $token]);
    }

    public function contact(){
        return view('dali.contacto');
    }

    public function activity(){
        return view('dali.actividades');
    }

    public function activities($plano){
        if($plano !== "Prem"):
            $actividades = Actividad::getActividades($plano);
        else:
            if(auth()->check()):
                if(auth()->user()->id_perfil != 2):
                    $actividades = Actividad::getActividadesPremium();
                else:
                    return redirect()->back(); 
                endif; 
            else:
                return redirect()->back();
            endif;
        endif;
        if(!$actividades):
            return redirect()->back();
        else:
            return view('dali.actividadesListado')->with(["actividades" => $actividades]);
        endif;
    }

    public function center(){
        $centros = Centro::all();
        $coordenadas = Centro::coordenadas();
        return view('dali.centros')->with(["centros" => $centros])->with(["coordenadas" => $coordenadas]);
    }

    public function forum(){
        $categorias = Categoria::all();
        $ultimaPub = array();
        $cantidadPubs = array();
        foreach($categorias as $cat):
            $ultPub = Publicacion::getLastPub($cat->id);
            $ultimaPub[$cat->id] = $ultPub;
            
            $cantPubs = Publicacion::getCountPubs($cat->id);
            $cantidadPubs[$cat->id] = $cantPubs;
        endforeach;
        
        return view("dali.foro")->with(["categorias" => $categorias])->with(["ultimaPub" => $ultimaPub])->with(["cantidadPubs" => $cantidadPubs]);
    }

    public function pubsByCategory($id){
        
        $categoria = Categoria::find($id);
        
        if(!$categoria):
            return redirect()->route("web.forum");
        else:
            $publicaciones = Publicacion::getAll($id);
            $categoriaDatos = Categoria::getDatos($id);
            $cantidadComments = array();
            foreach($publicaciones as $pub):
                $cantComentarios = Comentario::getCantidadByPub($pub->id);
                $cantidadComments[$pub->id] = $cantComentarios;
            endforeach;
            
            return view("dali.publicacionesListado")->with(["publicaciones" => $publicaciones])->with(["categoriaDatos" => $categoriaDatos])->with(["cantidadComments" => $cantidadComments]);
        
        endif;
    }

    public function publicacionNewView($id){
        
        $categoria = Categoria::find($id);
        
        if(!$categoria):
            return redirect()->route("web.forum");
        else:
            $categoriaDatos = Categoria::getDatos($id);
            return view("dali.publicacionNew")->with(["categoriaDatos" => $categoriaDatos]);
        endif;
    }

    public function pubView($id_categoria,$id_publicacion){
        $categoria = Categoria::find($id_categoria);
        $publicacion = Publicacion::find($id_publicacion);
        if(!$categoria || !$publicacion):
            return redirect()->route("web.forum");
        else:
            if($publicacion->id_categoria !== $categoria->id):
                return redirect()->route("web.forum");
            else:
                $comentarios = Comentario::getComentariosByPub($id_publicacion);
                $publicacionDatos = Publicacion::getDatos($id_publicacion);
                return view("dali.publicacionView")->with(["categoria" => $categoria])->with(["publicacion" => $publicacionDatos])->with(["comentarios" => $comentarios]);
            endif;
        endif;
    }
    
    public function adminIndex(){
        return view('admin.index');
    }

}
