<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use App\Models\Categoria;

class PublicacionController extends Controller
{
    protected $publicacion;

    public function __construct(Publicacion $publicacion){
        $this->publicacion = $publicacion;
    }

    public function newPublicacion(Request $request){

        $validated = $request->validate([
            'id_cat' => ['required'],
            'id_usuario' => ['required'],
            'nombre' => ['required'],
            'mensaje' => ['required'],
        ]);

        $id_categoria = $request->id_cat;
        $id_usuario = $request->id_usuario;
        $nombre = $request->nombre;
        $mensaje = $request->mensaje;

        $categoria = Categoria::find($id_categoria);
        
        if(!$categoria):
            return redirect()->back()->with('failure', 'La categoría que corresponde a la publicación no existe.');
        else:
            $publicacion = new Publicacion;
        
            $publicacion->nombre = $nombre;
            $publicacion->descripcion = $mensaje;
            $publicacion->id_categoria = $id_categoria;
            $publicacion->id_usuario = $id_usuario;
            
            $publicacion->save();
            
            return redirect()->route("web.forumCat",$id_categoria)->with('success', '¡La publicación se ha creado exitosamente!');
        endif;
        
    }

    public function blockPublicacion(Request $request){
        
        $validated = $request->validate([
            'block_pub_id' => ['required'],
        ]);

        $id = $request->block_pub_id;

        $publicacion = $this->publicacion->find($id);

        if(!$publicacion):
            return redirect()->back()->with('failure', 'La publicación que quiere bloquear no existe.');
        else:
            $publicacion->nombre = "Publicación bloqueada :c";
            $publicacion->descripcion = "*BLOQUEADO* \r\nPublicación bloqueada por contener material inapropiado.";
            $publicacion->save();
            return redirect()->back()->with('success', '¡La publicación ha sido bloqueada exitosamente!');
        endif;
    }
}
