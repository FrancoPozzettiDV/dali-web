<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Google_Client; 
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class ActividadController extends Controller
{
    protected $actividad;
    protected $drive_client;

    public function __construct(Actividad $actividad){
        $this->actividad = $actividad;
        $this->drive_client = new Google_Client();
        $this->drive_client->useApplicationDefaultCredentials();
        $this->drive_client->setScopes(['https://www.googleapis.com/auth/drive.file']);
    }
    
    public function actividadesTableView(){
        
        $actividades= $this->actividad->all();

        return view('admin.actividades')->with(["actividades" => $actividades]);
    }

    public function actividadNewView(){
        return view('admin.actividadNew');
    }

    public function newActividad(Request $request){
        ini_set("upload_max_filesize","20M");
	    ini_set("post_max_size","20M");
        
        $validated = $request->validate([
            'name' => ['required'],
            'plano' => ['required'],
            'edad' => ['required'],
            'exclusivo' => ['required'],
            'archivo' => ['required'],
        ]);

        $nombre = trim(ucfirst($request->name));
        $plano = $request->plano;
        $edad = $request->edad;
        $exclusivo = $request->exclusivo;
        $formato = $request->file('archivo')->getClientOriginalExtension(); //extension()

        try{
            $service = new Google_Service_Drive($this->drive_client);
            $file_path = $request->file('archivo')->getRealPath();
            $mime = $request->file('archivo')->getMimeType();

            $file = new Google_Service_Drive_DriveFile();
		    $file->setName($nombre);
            $file->setParents(array("1fmHNcjqlrxHw8y6D3JDsPpzbI0o-3VZz"));
		    $file->setDescription("Archivo cargado desde DALI");
		    $file->setMimeType($mime);

            $response = $service->files->create(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime,
                    'uploadType' => 'media'
                )
            );

            $id_drive = $response->id;

            $activity = new Actividad;
        
            $activity->nombre = $nombre;
            $activity->formato = $formato;
            $activity->plano_linguistico = $plano;
            $activity->rango_edad = $edad;
            $activity->id_perfil = $exclusivo;
            $activity->id_drive = $id_drive;
            
            $activity->save();

        }catch(Google_Service_Exception $gs){
            $message = json_decode($gs->getMessage());
            return redirect()->back()->with('failure', $message->error->message());
        }

        return redirect()->route("admin.actividades")->with('success', '¡El registro se ha creado exitosamente!');
    }
    
    public function actividadEditView($id){
        $actividad = $this->actividad->find($id);

        if(!$actividad):
            return redirect()->back();
        else:
            return view('admin.actividadEdit')->with(["actividad" => $actividad]);
        endif;
    }

    public function editActividad(Request $request){
        
        $validated = $request->validate([
            'name' => ['required'],
            'plano' => ['required'],
            'edad' => ['required'],
            'exclusivo' => ['required'],
            'id_drive' => ['required'],
        ]);

        $id= $request->id;
        $nombre = trim(ucfirst($request->name));
        $plano = $request->plano;
        $edad = $request->edad;
        $exclusivo = $request->exclusivo;
        $id_drive = $request->id_drive;

        $actividad = $this->actividad->find($id);

        $actividad->nombre = $nombre;
        $actividad->plano_linguistico = $plano;
        $actividad->rango_edad = $edad;
        $actividad->id_perfil = $exclusivo;
        
        $actividad->save();
        
        try{
            $service = new Google_Service_Drive($this->drive_client);
				
            $emptyFile = new Google_Service_Drive_DriveFile();  
            $emptyFile->setName($nombre);
            
            $service->files->update($id_drive, $emptyFile, array());

        }catch(Google_Service_Exception $gs){
            $message = json_decode($gs->getMessage());
            return redirect()->back()->with('failure', $message->error->message());
        }

        return redirect()->route("admin.actividades")->with('success', '¡El registro se ha modificado exitosamente!');
    }

    public function deleteActividad(Request $request){
        
        $id_drive = $this->actividad->getIdDrive($request->id);
        try{
            $service = new Google_Service_Drive($this->drive_client);
            $service->files->delete($id_drive);

            $actividad = $this->actividad->find($request->id);
            $actividad->delete();
            
        }catch(Google_Service_Exception $gs){
            $message = json_decode($gs->getMessage());
            return redirect()->back()->with('failure', $message->error->message());
        }
       
        return redirect()->back()->with('success', 'El registro se ha eliminado exitosamente.');
    }
}
