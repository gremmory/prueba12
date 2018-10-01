<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Fotos;
use App\Establecimientos;
use App\Requests\FotosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class FotosController extends Controller
{
    //
    public function getFotos($id){
    	//$fotos = DB::table('fotos')->where('establecimientos_cod_establecimiento', '=', $id);
    	$fotos = fotos::where('establecimientos_cod_establecimiento', '=', $id)->get();
    	return View('model.fotos.create', 
    		[
    			"establecimiento" => establecimientos::findOrFail($id), 
    			"fotos" => $fotos,
    		]
    	);
    }



    public function Insetar(Request $request){
        if($this->VerificarAdd()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para agregar'));
        }
    	$validatedData = $request->validate([
    		'imagen' => 'required',
    		'imagen.*' => 'mimes:jpeg,jpg,png,gif',
            'establecimientos_cod_establecimiento' => 'required',
        ]);

        $files = $request->file('imagen');
        $destinationPath = 'uploads';
		foreach($files as $file) {
            $filename = uniqid() . $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
            //nombre 

            $imagen = new Fotos;
		    $imagen->imagen = $filename;
		    $imagen->establecimientos_cod_establecimiento = $request->establecimientos_cod_establecimiento;
		    $imagen->save();
        }
        return back()->with('success', 'Your files has been successfully added');
    }

    public function destroy($id1, $id2){
        if($this->VerificarModi()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para editar'));
        }
		if(\File::exists(public_path('uploads/' . $id1))){
			\File::delete(public_path('uploads/' . $id1));
			$query=fotos::findOrFail($id2);
	    	$query->delete();
	    	return back()->with('success', 'Eliminado Exitosamente');
		}else{
			return back()->with('fail', 'Error al elminar');;
		}
    }

    public function VerificarModi(){
        if(Auth::user()->admin == 1 || Auth::user()->permite_modif == 1){
            return false;
        }
        return true;
    }
    public function VerificarAdd(){
        if(Auth::user()->admin == 1 || Auth::user()->permite_agregar == 1){
            return false;
        }
        return true;
    }
}
