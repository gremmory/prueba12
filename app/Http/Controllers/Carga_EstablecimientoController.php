<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Storage;
use App\Establecimientos;
use App\Municipios;
use App\Departamentos;
use App\Jornadas;
use App\Niveles;
use App\Dispositivos;
use App\Marcas;
use App\Detalle_Equipos;
use App\Fases;
use Excel;
//use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Excel;
//use Maatwebsite\Excel\Facades\Excel;

class Carga_EstablecimientoController extends Controller
{
    //
    public function index (Request $request){
    	return view('carga.carga_establecimiento');
    }

    public function index2 (Request $request){
    	return view('carga.carga_dispositivos');
    }

    public function dispositivoss(Request $request){
    	$archivo = $request->file('archivo');
		$nombre_original= $archivo->getClientOriginalName(); //uniqid() . 
		$extension=$archivo->getClientOriginalExtension();
		$r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
		$ruta  =  storage_path('archivos') ."/". $nombre_original;

		try {
			if($r1){
	       	    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) { })->get();
	       	    if(!empty($data) && $data->count()){
	       	    	$ct = 2;
	       	    	$fila_archivo = "";
	       	    	$falta_datos = "";

	       	    	$detalle_equipo_todo = Detalle_Equipos::all();
	       	    	$marcas_todo = Marcas::all();

	       	    	$fases_todo = Fases::all();
	       	    	$tipo_equipos_todo = Dispositivos::all();
	       	    	foreach ($data as $key => $fila) {
	       	    		$buscar_establecimiento = Establecimientos::where("cod_establecimiento", $fila->cod_establecimiento)->first();

		       	    	$fases = $fases_todo->where("Nombre", $fila->fase)->first();
		       	    	$tipo_equipos = $tipo_equipos_todo->where("Desc_tipoequipo", $fila->tipo_equipo)->first();

	       	    		if($buscar_establecimiento && $fases && $tipo_equipos){//existe establecimiento
	       	    			$detalle_equipo = $detalle_equipo_todo
	       	    					->where("cod_establecimiento", $fila->cod_establecimiento)
	       	    					->where("tipo_equipo", $tipo_equipos['tipo_equipo'])
	       	    					->where("cod_equipo", $fila->codigo_equipo)->first();

	       	    			if(empty($detalle_equipo)){
	       	    				//$marcas = Marcas::where("Desc_Marca", $fila->marca)->first();
	       	    				$marcas = $marcas_todo->where("Desc_Marca", $fila->marca)->first();
	       	    				Detalle_Equipos::create([
		       	    				//$query = new Detalle_Equipos;
		       	    				'cod_establecimiento' => $fila->cod_establecimiento,
		       	    				'cod_equipo' => $fila->codigo_equipo,
		       	    				
		       	    				'tipo_equipo' => $tipo_equipos['tipo_equipo'],

		       	    				'desc_equipo' => $fila->desc_equipo,
		       	    				'id_marca' => ($marcas)? $marcas['Id_Marca'] : null,
		       	    				'series' => $fila->series,
		       	    				'cantidad' =>$fila->cantidad,
		       	    				'Observaciones' => $fila->observaciones,
		       	    				'Fases_Id_Fase' => $fases->Id_Fase,
		       	    				'tipo' => $fila->tipo
	       	    				]);
	       	    			}
	       	    			else{
	       	    				$fila_archivo = $fila_archivo . $ct . ", ";
	       	    			}
	       	    		}
	       	    		else{
	       	    			$falta_datos = $falta_datos . $ct . ", ";
	       	    		}
				        $ct++;
	       	    	}
	            }
	            //return "";
	            Storage::disk('archivos')->delete($nombre_original);
	            if($request->ajax()){
	            	if($fila_archivo == "" && $falta_datos == ""){
		            	return response()->json([
		            		'success' =>'Se subio el archivo correctamente',
		            		'medium' =>''
		            	]);
		            }
		            else{
		            	$resto = ($falta_datos == "") ? "" : 'Se cargo parte del archivo. Se encontraron errores o falta de información en las siguientes filas: ' . $falta_datos;
		            	$restoB = ($fila_archivo == "") ? "" : " Y se encontraron datos repetidos en las filas: " . $fila_archivo;


		            	return response()->json([
		            		'success' =>'',
		            		'medium' => $resto . $restoB
		            	]);
		            }
	            }
	            if($fila_archivo == "" && $falta_datos == ""){
	            	return back()->with('success', 'Se subio el archivo correctamente');
	            }
	            else{
	            	$resto = ($falta_datos == "") ? "" : 'Se cargo parte del archivo. Se encontraron errores o falta de información en las siguientes filas: ' . $falta_datos;
		           	$restoB = ($fila_archivo == "") ? "" : " Y se encontraron datos repetidos en las filas: " . $fila_archivo;

	            	return back()->with('medium', $resto . $restoB);
	            }
	       	}
	       	else
	       	{
	       		return back()->with('fail', 'Error al subir el archivo');
	       	}
	    }catch ( \Illuminate\Database\QueryException $e) {
	    	Storage::disk('archivos')->delete($nombre_original);
		    if($request->ajax()){
				return response()->json([
					'fail' =>'Error al subir el archivo - Se encontraron datos no validos'
				]);
            }
       		return back()->with('fail', 'Error al subir el archivo - Se encontraron datos no validos');
		}
		catch (PDOException $e) {
			Storage::disk('archivos')->delete($nombre_original);
            if($request->ajax()){
				return response()->json([
					'fail' =>'Error al subir el archivo - Se encontraron datos no validos'
				]);
            }
       		return back()->with('fail', 'Error al subir el archivo - Se encontraron datos no validos');
        }
    }








    public function establecimientos(Request $request){
    	
    	$archivo = $request->file('archivo');
    	//return $archivo;
		$nombre_original= $archivo->getClientOriginalName(); //uniqid() . 
		$extension=$archivo->getClientOriginalExtension();
		if ($extension != "xlsx" && $extension != "xls" && $extension != "csv") {
			return back()->with('fail', 'Error al subir el archivo, fortmato no valido [Xlsx, xls, csv]');
		}
		$r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
		$ruta  = storage_path('archivos') ."/". $nombre_original; // storage_path('archivos') ."\\". $nombre_original;
		
    	$fila_archivo = "";
    	$repetidos = "";
		try {
			if($r1){
	       	    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) { })->get();
	       	    if(!empty($data) && $data->count()){
	       	    	$ct = 2;
	       	    	//set_time_limit(0);
	       	    	$municipios_todos = Municipios::all();
	       	    	$departamentos_todos = Departamentos::all();
	       	    	$niveles_todos = Niveles::all();
	       	    	foreach ($data as $key => $fila) {
	       	    		$buscar_establecimiento=DB::table('establecimientos')->where("cod_establecimiento", $fila->cod_establecimiento)->first();
				        if($fila->cod_establecimiento){
		       	    		if($buscar_establecimiento == null){
		       	    			//$ni_to = clone $niveles_todos;
			       	    		$niveles = $niveles_todos->where("desc_nivel", $fila->nivel)->first();
			       	    		//$niveles = Niveles::where("desc_nivel", $fila->nivel)->first();

			       	    		//$dpt_to = clone $departamentos_todos;
			       	    		$departamentos = $departamentos_todos->where("Desc_Deptos", $fila->departamento)->first();
		       	    			if($departamentos){ // && $ax == 0

		       	    				//$mun_to = clone $municipios_todos;
		       	    				$municipios = $municipios_todos->where("COD_DEPTO", $departamentos['cod_Depto'])
		       	    								->where("NOM_MUPIO", $fila->municipio)->first();
		       	    				if($municipios){
		       	    					//$fila_archivo = $fila_archivo ." " . $ct . ",";
		       	    					
		       	    					Establecimientos::create([
		       	    						'cod_depto' => $departamentos['cod_Depto'],
									        'cod_mupio' => $municipios['COD_MUPIO'],
									        'cod_nivel' => ($niveles)? $niveles['cod_nivel'] : null,

									        'cod_establecimiento' => (string)$fila->cod_establecimiento,
					       	    			'ESTABLECIMIENTO' => $fila->establecimiento,
									        'DIRECCION' => $fila->direccion,
									        'TELEFONO' => (strlen($fila->telefono) < 50) ? $fila->telefono : "",
									        'SECTOR' => $fila->sector,
									        'AREA' => $fila->area,
									        'JORNADA' =>  $fila->jornada,
									        'DIRECTOR' => $fila->director,
									        'ALUMNOS' => intval($fila->alumnos),
									        'ALUMNAS' => intval($fila->alumnas),
									        'TOTAL' => intval($fila->alumnas) + intval($fila->alumnos),
									        'MAESTROS' => intval($fila->docentes),
									        'modalidad' => $fila->modalidad,
									        'opf' => (strtolower($fila->opf) == "si")? 1 : 0,
									        'cuenta_carta' => (strtolower($fila->cuenta_carta) == "si")? 1 : 0,
									        'latitud' => $fila->latitud,
									        'longitud' => $fila->longitud,
									        'certificacion' => (strtolower($fila->certificacion) == "si")? 1 : 0,
									        'acta_anuencia' => (strtolower($fila->acta_anuencia) == "si")? 1 : 0,
									        'electricidad' => (strtolower($fila->electricidad) == "si")? 1 : 0,
									        'seguridad' => (strtolower($fila->seguridad) == "si")? 1 : 0,
									        'status' => $fila->status,
									        'observaciones' => $fila->observaciones,
									        'correo' => $fila->correo
		       	    					]);

		       	    				}
		       	    				else{
		       	    					$fila_archivo = $fila_archivo . $ct . ", ";
		       	    				}
		       	    			}
		       	    			else {
		       	    				$fila_archivo = $fila_archivo . $ct . ", ";
		       	    			}
		       	    		}
		       	    		else{
		       	    			$repetidos = $repetidos . $ct . ", ";
		       	    		}
				        }
				        $ct++;
	       	    	}
	            }
	            //Storage::delete("archivos" . $nombre_original);
	            Storage::disk('archivos')->delete($nombre_original);
	            if($request->ajax()){
	            	if($fila_archivo == "" && $repetidos == ""){
		            	return response()->json([ 'success' =>'Se subio el archivo correctamente', 'medium' =>'' ]);
		            }
		            else{
		            	return response()->json([
		            		'success' =>'',
		            		'medium' => (($fila_archivo == "")? " " : 'Se cargo parte del archivo. Se encontraron errores en las siguientes filas: ') . $fila_archivo . (($repetidos == "")? " " : ". Y se encontraron datos repetidos en las filas: " . $repetidos)
		            	]);
		            }
	            }

	            if($fila_archivo == "" && $repetidos == ""){
	            	return back()->with('success', 'Se subio el archivo correctamente');
	            }
	            else{
	            	return back()->with('medium', (($fila_archivo == "")? " " : 'Se cargo parte del archivo. Se encontraron errores en las siguientes filas: ') . $fila_archivo . (($repetidos == "")? " " : ". Y se encontraron datos repetidos en las filas: " . $repetidos) );
	            }
	       	}
	       	else
	       	{
	       		if($request->ajax()){
					return response()->json([ 'fail' =>'Error al subir el archivo' ]);
	            }
	       		return back()->with('fail', 'Error al subir el archivo');
	       	}
		} 

















		catch ( \Illuminate\Database\QueryException $e) {
			Storage::disk('archivos')->delete($nombre_original);
		    if($request->ajax()){
				return response()->json([
					'fail' =>'Error al subir el archivo - Se encontraron datos no validos'
				]);
            }
       		return back()->with('fail', 'Error al subir el archivo - Se encontraron datos no validos');
		}
		catch (PDOException $e) {
			Storage::disk('archivos')->delete($nombre_original);
            if($request->ajax()){
				return response()->json([
					'fail' =>'Error al subir el archivo - Se encontraron datos no validos. '
				]);
            }
       		return back()->with('fail', 'Error al subir el archivo - Se encontraron datos no validos');
        }

    }
}











//$departamentos = DB::table("departamentos")->where("Desc_Deptos", $fila->departamento)->first();
			       	    		//$departamentos = Departamentos::where("Desc_Deptos", $fila->departamento)->first();
			       	    		
			       	    		//$niveles = DB::table("niveles")->where("desc_nivel", $fila->nivel)->first();