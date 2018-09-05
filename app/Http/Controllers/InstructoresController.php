<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornadas;
use App\Establecimientos;
use App\Profesiones;
use App\Instructores;
use App\Departamentos;
use App\Muncipios;
use App\Niveles;
use App\Fases;
use App\Http\Requests\InstructoresFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class InstructoresController extends Controller
{
public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		//$consulta=DB::table('instructores')
            $consulta=instructores::
            where('primer_nombre', 'LIKE', $query . '%')
            ->Orwhere('segundo_nombre', 'LIKE', $query . '%')
            ->Orwhere('primer_apellido', 'LIKE', $query . '%')
            ->Orwhere('segundo_apellido', 'LIKE', $query . '%')
    		->orderBy('primer_nombre', 'desc')
            ->paginate(10)
    		;
    		return view('model.instructores.index', ["instructores"=>$consulta, "searchText"=>$query]);
    	}
    }

    public function create (){
    	$departamentos = departamentos::all();
  		$profesiones = profesiones::all();
  		$establecimientos = establecimientos::all();
  		$jornadas = jornadas::all();

    	return view ('model.instructores.create', 
    		[
    			'departamentos'=> $departamentos,
    			'profesiones'=>$profesiones, 
    			'establecimientos'=>$establecimientos, 
    			'jornadas'=>$jornadas
    			//,'municipios'=>municipios::where('COD_DEPTO', '=', (string) '01')
    			//,'municipios'=>municipios::all()
    			//,'municipios'=>DB::table('municipios')->where('COD_DEPTO', '=', '01')
    		]);
    }
    public function getMunicipio (Request $request, $id){
    	if($request->ajax()){
    		$municipios = municipios::municipios($id);
    		return response()->json($municipios);
    	}
    }


    public function store (Request $request){
    	//
    }

    public function Insetar (InstructoresFormRequest $request){
    	$instructores= new Instructores($request->all());
        //$instructores->TOTAL = $establecimientos->ALUMNAS + $establecimientos->ALUMNOS;

		$instructores->save();
		 return Redirect::to('model/instructores');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.instructores.show", ["instructores"=>instructores::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.instructores.edit", 
    		[
    			"instructores"=>instructores::findOrFail($id), 
    			'departamentos'=> departamentos::all(),
    			'fases'=>fases::all(), 
    			'niveles'=>niveles::all(),

    			'profesiones'=>profesiones::all(),
    			'jornadas'=>jornadas::all(),
    			'establecimientos'=>establecimientos::all()
    		]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            //'cod_instructor' => 'required|unique:instructores,cod_instructor',
            'primer_apellido' => 'required',
            'segundo_apellido' => '',
            'apellido_casada' => '',
            'primer_nombre' => 'required',
            'segundo_nombre' => '',

            'direccion' => '',
            'telefono_casa' => '',
            'telefono_celular' => '',
            'orden_cedula' => '',
            'num_cedula' => '',
            'cod_mupio' => 'required',
            'cod_Depto' => 'required',
            'e_mail' => '',
            'fecha_nac' => '',
            'fecha_contrato' => '',
            'sueldo_inicial' => '',
            'fecha_ingreso' => '',
            'id_profesion' => '',
            'estudia_actualmente' => 'boolean',

            'carrera_que_estudia' => '',
            'ultimo_grado_aprobado' => '',
            'cod_establecimiento' => 'required',
            'nombre_director' => '',
            'id_jornada' => '',
            'hora_entrada' => '',
            'hora_salida' => '',
            'cantidad_alumnos' => '',
            'fecha_actualizacion' => '',
            'foto' => '',
            'comentarios' => '',
            'estado' => '',
        ]);
        $query=instructores::findOrFail($id);
        //$query->id_instructor = $request->id_instructor;
		//$query->cod_instructor = $request->cod_instructor;
		$query->primer_apellido = $request->primer_apellido;
		$query->segundo_apellido = $request->segundo_apellido;
		$query->apellido_casada = $request->apellido_casada;
		$query->primer_nombre = $request->primer_nombre;
		$query->segundo_nombre = $request->segundo_nombre;
		$query->direccion = $request->direccion;
		$query->telefono_casa = $request->telefono_casa;
		$query->telefono_celular = $request->telefono_celular;
		$query->orden_cedula = $request->orden_cedula;
		$query->num_cedula = $request->num_cedula;
		$query->cod_mupio = $request->cod_mupio;
		$query->cod_Depto = $request->cod_Depto;
		$query->e_mail = $request->e_mail;
		$query->fecha_nac = $request->fecha_nac;
		$query->fecha_contrato = $request->fecha_contrato;
		$query->sueldo_inicial = $request->sueldo_inicial;
		$query->fecha_ingreso = $request->fecha_ingreso;
		$query->id_profesion = $request->id_profesion;
		$query->estudia_actualmente = $request->estudia_actualmente;
		$query->carrera_que_estudia = $request->carrera_que_estudia;
		$query->ultimo_grado_aprobado = $request->ultimo_grado_aprobado;
		$query->cod_establecimiento = $request->cod_establecimiento;
		$query->nombre_director = $request->nombre_director;
		$query->id_jornada = $request->id_jornada;
		$query->hora_entrada = $request->hora_entrada;
		$query->hora_salida = $request->hora_salida;
		$query->cantidad_alumnos = $request->cantidad_alumnos;
		$query->fecha_actualizacion = $request->fecha_actualizacion;
		$query->foto = $request->foto;
		$query->comentarios = $request->comentarios;
		$query->estado = $request->estado;

        $query->update();

        return Redirect::to('model/instructores');
    }

    public function destroy ($id){
    	$query=instructores::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/instructores');//nomodel/annos
    }
}
