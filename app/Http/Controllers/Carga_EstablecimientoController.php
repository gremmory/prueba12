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
		$ruta  =  storage_path('archivos') ."\\". $nombre_original;

		if($r1){

       	    //$ct=0;//'public/P1.xlsx'
       	    //Excel::load($path, function($reader) {})->get();
       	    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) { })->get();
       	    if(!empty($data) && $data->count()){
       	    	$ct = 2;
       	    	$fila_archivo = "";
       	    	$falta_datos = "";
       	    	foreach ($data as $key => $fila) {
       	    		$buscar_establecimiento = Establecimientos::where("cod_establecimiento", $fila->cod_establecimiento)->first();
	       	    	$fases = Fases::where("Nombre", $fila->fase)->first();
	       	    	$tipo_equipos = Dispositivos::where("Desc_tipoequipo", $fila->tipo_equipo)->first();


			        if($fila->cod_establecimiento){
	       	    		if(count($buscar_establecimiento) != 0 && count($fases) != 0 && count($tipo_equipos) != 0){//existe establecimiento
	       	    			$detalle_equipo = Detalle_Equipos::where("cod_establecimiento", $fila->cod_establecimiento)
													->where("tipo_equipo", $tipo_equipos->tipo_equipo)
													->where("cod_equipo", $fila->codigo_equipo)->first();
	       	    			if(count($detalle_equipo) == 0){
	       	    				$marcas = Marcas::where("Desc_Marca", $fila->marca)->first();
       	    				
	       	    				$query = new Detalle_Equipos;
	       	    				$query->cod_establecimiento = $fila->cod_establecimiento;
	       	    				$query->cod_equipo = $fila->codigo_equipo;
	       	    				
	       	    				$query->tipo_equipo = $tipo_equipos->tipo_equipo;

	       	    				$query->desc_equipo = $fila->desc_equipo;
	       	    				$query->id_marca = (count($marcas) != 0)? $marcas->Id_Marca : null;
	       	    				$query->series = $fila->series;
	       	    				$query->cantidad =$fila->cantidad;
	       	    				$query->Observaciones = $fila->observaciones;
	       	    				$query->Fases_Id_Fase = $fases->Id_Fase;
	       	    				$query->tipo = $fila->tipo;

	       	    				$query->save();
	       	    			}
	       	    			else{
	       	    				$fila_archivo = $fila_archivo . $ct . ", ";
	       	    			}
       	    				//break;
	       	    		}
	       	    		else{
	       	    			$falta_datos = $falta_datos . $ct . ", ";
	       	    		}
			        }
			        $ct++;
       	    	}
            }
            //return "";
            Storage::disk('archivos')->delete($nombre_original);
            if($fila_archivo == "" && $falta_datos == ""){
            	return back()->with('success', 'Se subio el archivo correctamente');
            }
            else{
            	return back()->with('medium', 'Se cargo parte del archivo. Se encontraron errores en las siguientes filas:' . $fila_archivo . ". Y se encontraron datos repetidos en las filas: " . $falta_datos);
            }
       	}
       	else
       	{
       		return back()->with('fail', 'Error al subir el archivo');
       	}
    }


    public function establecimientos(Request $request){
    	$archivo = $request->file('archivo');
		$nombre_original= $archivo->getClientOriginalName(); //uniqid() . 
		$extension=$archivo->getClientOriginalExtension();
		if ($extension != "xlsx" && $extension != "xls" && $extension != "csv") {
			return back()->with('fail', 'Error al subir el archivo, fortmato no valido [Xlsx, xls, csv]');
		}
		$r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
		$ruta  = storage_path('archivos') ."/". $nombre_original; // storage_path('archivos') ."\\". $nombre_original;
		if($r1){

       	    //$ct=0;//'public/P1.xlsx'
       	    //Excel::load($path, function($reader) {})->get();
       	    //return $ruta;
       	    $data = Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) { })->get();
		        //$hoja->each(function($fila) { //    05-02-1950-40
       	    if(!empty($data) && $data->count()){
       	    	$ct = 2;
       	    	$fila_archivo = "";
       	    	$repetidos = "";
       	    	//$variable = $hoja->get();
       	    	//$ax = 0;
       	    	foreach ($data as $key => $fila) {
       	    		# code...
       	    		$buscar_establecimiento = Establecimientos::where("cod_establecimiento", $fila->cod_establecimiento)->first();
			        if($fila->cod_establecimiento){
	       	    		if($buscar_establecimiento == null){
	       	    			$municipios = Municipios::where("NOM_MUPIO", $fila->municipio)->first();
		       	    		$departamentos = Departamentos::where("Desc_Deptos", $fila->departamento)->first();
		       	    		$niveles = Niveles::where("desc_nivel", $fila->nivel)->first();
	       	    			if($municipios and $departamentos){ // && $ax == 0
	       	    				//insertar datos
	       	    				$query = new Establecimientos;
	       	    				$query->cod_establecimiento = (string)$fila->cod_establecimiento;
		       	    			$query->cod_depto = $departamentos->cod_Depto;
						        $query->cod_mupio = $municipios->COD_MUPIO;
						        $query->ESTABLECIMIENTO = $fila->establecimiento;

						        //verificar Nivel
						        //$query->cod_nivel = $fila->cod_nivel;
						        $query->cod_nivel = ($niveles)? $niveles->cod_nivel : null;
						        $query->DIRECCION = $fila->direccion;
						        $query->TELEFONO = $fila->telefono;
						        $query->SECTOR = $fila->sector;

						        $query->AREA = $fila->area;
						        //Verificar Jornada
						        //$query->JORNADA = $fila->jornada;
						        $query->JORNADA =  $fila->jornada;//(count($jornada) != 0)? $jornada->id_jornada : "";
						        $query->DIRECTOR = $fila->director;
						        $query->ALUMNOS = intval($fila->alumnos);

						        $query->ALUMNAS = intval($fila->alumnas);
						        $query->TOTAL = intval($fila->alumnas) + intval($fila->alumnos);
						        $query->MAESTROS = intval($fila->docentes);
						        //$query->MULTIGRADO = $fila->multigrado;
						        $query->modalidad = $fila->modalidad;
						        $query->opf = (strtolower($fila->opf) == "si")? 1 : 0;

						        $query->cuenta_carta = (strtolower($fila->cuenta_carta) == "si")? 1 : 0;
						        $query->latitud = $fila->latitud;
						        $query->longitud = $fila->longitud;
						        $query->certificacion = (strtolower($fila->certificacion) == "si")? 1 : 0;
						        $query->acta_anuencia = (strtolower($fila->acta_anuencia) == "si")? 1 : 0;
						        $query->electricidad = (strtolower($fila->electricidad) == "si")? 1 : 0;
						        $query->seguridad = (strtolower($fila->seguridad) == "si")? 1 : 0;
						        $query->status = $fila->status;
						        $query->observaciones = $fila->observaciones;
						        $query->correo = $fila->correo;

						        $query->save();
	       	    			}
	       	    			else {
	       	    				//echo "no entro ---> <br>";
	       	    				$fila_archivo = $fila_archivo . $ct . ", ";
	       	    			}
	       	    			//echo "<br>" . $ct; 
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

            //return "";
            if($fila_archivo == "" && $repetidos == ""){
            	return back()->with('success', 'Se subio el archivo correctamente');
            }
            else{
            	return back()->with('medium', 'Se cargo parte del archivo. Se encontraron errores en las siguientes filas:' . $fila_archivo . ". Y se encontraron datos repetidos en las filas: " . $repetidos);
            }
       	}
       	else
       	{
       		return back()->with('fail', 'Error al subir el archivo');
       	}
    }
}
