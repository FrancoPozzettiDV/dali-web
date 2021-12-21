<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Categoria;

class ComentarioController extends Controller
{
    protected $comentario;

    public function __construct(Comentario $comentario){
        $this->comentario = $comentario;
    }

    public function newComentario(Request $request){
        
        $validated = $request->validate([
            'id_pub' => ['required'],
            'id_usuario' => ['required'],
            'id_cat' => ['required'],
            'comentario' => ['required'],
        ]);

        $id_publicacion = $request->id_pub;
        $id_categoria = $request->id_cat;
        $id_usuario = $request->id_usuario;
        $comentario = $request->comentario;

        if(auth()->user()->id != $id_usuario):
            return redirect()->back()->with('failure', 'El usuario que ha ingresado el comentario no coincide con el usuario en sesión.');
        endif;
        
        $publicacion = Publicacion::find($id_publicacion);
        if($publicacion):
            $categoria = Categoria::find($id_categoria);
        endif;
        
        if(!$publicacion || !$categoria):
            return redirect()->back()->with('failure', 'La publicación o categoría que corresponde el comentario no existe.');
        else:
            if($publicacion->id_categoria !== $categoria->id):
                return redirect()->back()->with('failure', 'La publicación o categoría que corresponde el comentario no existe.');
            else:
                $newComentario = new Comentario;
        
                $newComentario->mensaje = $comentario;
                $newComentario->id_publicacion = $id_publicacion;
                $newComentario->id_usuario = $id_usuario;
            
                $newComentario->save();
            
                return redirect()->back()->with('success', '¡El comentario se ha creado exitosamente!');
            endif;
        endif;
    }

    public function editComentario(Request $request){

        $validated = $request->validate([
            'com_id' => ['required'],
            'mensaje' => ['required'],
        ]);

        $id = $request->com_id;
        $mensaje = $request->mensaje;

        $comentario = $this->comentario->find($id);
        
        if(!$comentario):
            return redirect()->back()->with('failure', 'El comentario que quiere modificar no existe.');
        else:
            if($comentario->id_usuario != auth()->user()->id):
                return redirect()->back()->with('failure', 'El usuario que corresponde el comentario no coincide con el usuario en sesión.');
            else:
                $comentario->mensaje = $mensaje;
                $comentario->save();
                return redirect()->back()->with('success', '¡El comentario se ha modificado exitosamente!');
            endif;
        endif;
        
    }

    public function deleteComentario(Request $request){
        
        $validated = $request->validate([
            'del_com_id' => ['required'],
        ]);

        $id = $request->del_com_id;

        $comentario = $this->comentario->find($id);
        
        if(!$comentario):
            return redirect()->back()->with('failure', 'El comentario que quiere eliminar no existe.');
        else:
            if($comentario->id_usuario != auth()->user()->id):
                return redirect()->back()->with('failure', 'El usuario que corresponde el comentario no coincide con el usuario en sesión.');
            else:
                $comentario->delete();
                return redirect()->back()->with('success', '¡El comentario se ha eliminado exitosamente!');
            endif;
        endif;

    }

    public function blockComentario(Request $request){
        
        $validated = $request->validate([
            'block_com_id' => ['required'],
        ]);

        $id = $request->block_com_id;

        $comentario = $this->comentario->find($id);
        
        if(!$comentario):
            return redirect()->back()->with('failure', 'El comentario que quiere bloquear no existe.');
        else:
            $comentario->mensaje = "*BLOQUEADO* \r\nComentario bloqueado por contener material inapropiado.";
            $comentario->bloqueado = 1;
            $comentario->save();
            return redirect()->back()->with('success', '¡El comentario se ha bloqueado exitosamente!');
        endif;
    }
}
