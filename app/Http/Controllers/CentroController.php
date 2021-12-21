<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    protected $centro;

    public function __construct(Centro $centro){
        $this->centro = $centro;
    }
    
    public function centrosTableView(){
        
        $centros= $this->centro->all();

        return view('admin.centros')->with(["centros" => $centros]);
    }

    public function centroNewView(){
        return view('admin.centroNew');
    }

    public function newCentro(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'web' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $nombre = trim($request->name);
        $direccion = trim($request->address);
        $telefono = trim($request->phone);
        $web = trim($request->web);
        $latitud = $request->latitude;
        $longitud = $request->longitude;
        
        
        $centroSalud = new Centro;
        
        $centroSalud->nombre = $nombre;
        $centroSalud->direccion = $direccion;
        $centroSalud->telefono = $telefono;
        $centroSalud->web = $web;
        $centroSalud->latitud = $latitud;
        $centroSalud->longitud = $longitud;
        
        $centroSalud->save();
        
        return redirect()->route("admin.centros")->with('success', '¡El registro se ha creado exitosamente!');
    }
    
    public function centroEditView($id){
        $centro = $this->centro->find($id);

        if(!$centro):
            return redirect()->back();
        else:
            return view('admin.centroEdit')->with(["centro" => $centro]);
        endif;
    }

    public function editCentro(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'web' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $id = $request->id;
        $nombre = trim($request->name);
        $direccion = trim($request->address);
        $telefono = trim($request->phone);
        $web = trim($request->web);
        $latitud = $request->latitude;
        $longitud = $request->longitude;

        $centroSalud = $this->centro->find($id);
        
        $centroSalud->nombre = $nombre;
        $centroSalud->direccion = $direccion;
        $centroSalud->telefono = $telefono;
        $centroSalud->web = $web;
        $centroSalud->latitud = $latitud;
        $centroSalud->longitud = $longitud;
        
        $centroSalud->save();
        
        return redirect()->route("admin.centros")->with('success', '¡El registro se ha modificado exitosamente!');
    }

    public function deleteCentro(Request $request){
        $id = $request->id;
        $centro = $this->centro->find($id);
        $centro->delete();
        return redirect()->back()->with('success', 'El registro se ha eliminado exitosamente.');
    }
}
