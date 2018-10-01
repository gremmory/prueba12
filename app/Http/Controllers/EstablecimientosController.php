<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimientos;
use App\Departamentos;
use App\Municipios;
use App\Fases;
use App\Niveles;
use App\Http\Requests\EstablecimientosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class EstablecimientosController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		//$consulta=DB::table('establecimientos')
            $consulta=Establecimientos::where('ESTABLECIMIENTO', 'LIKE', $query . '%')
            ->orWhere('cod_establecimiento', 'LIKE', $query . '%')
    		->orderBy('ESTABLECIMIENTO', 'desc')
            ->paginate(10)
    		;
    		return view('model.establecimientos.index', ["establecimientos"=>$consulta, "searchText"=>$query]);
    	}
    }

    public function create (){
        if($this->VerificarAdd()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para agregar'));
        }
    	$departamentos = departamentos::all();
  		$fases = fases::all();
  		$niveles = niveles::all();

    	return view ('model.establecimientos.create', 
    		[
    			'departamentos'=> $departamentos,
    			'fases'=>$fases, 
    			'niveles'=>$niveles
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

    public function Insetar (EstablecimientosFormRequest $request){
        if($this->VerificarAdd()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para agregar'));
        }

    	$establecimientos= new Establecimientos($request->all());
        $establecimientos->TOTAL = $establecimientos->ALUMNAS + $establecimientos->ALUMNOS;

		$establecimientos->save();
		 return Redirect::to('model/establecimientos');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.establecimientos.show", ["establecimientos"=>establecimientos::findOrFail($id)]);
    }

	public function edit ($id){
        if($this->VerificarModi()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para editar'));
        }
    	return view("model.establecimientos.edit", 
    		[
    			"establecimientos"=>establecimientos::findOrFail($id), 
    			'departamentos'=> departamentos::all(),
    			'fases'=>fases::all(), 
    			'niveles'=>niveles::all()
    		]);
    }

    public function update (Request $request, $id){
        if($this->VerificarModi()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para editar'));
        }
        $validatedData = $request->validate([
            //'cod_establecimiento' => 'required|unique:establecimientos,cod_establecimiento,'.$id .'|max:12',
            'cod_depto' => 'required|min:1',
            'cod_mupio' => 'required|min:1|max:5',
            'ESTABLECIMIENTO' => 'required|max:100',
            'cod_nivel' => 'required|min:2|max:3',
            'DIRECCION' => 'required|max:300',
            'TELEFONO' => 'numeric',
            'SECTOR' => 'max:20',
            'AREA' => 'max:20',
            'JORNADA' => 'max:15',
            'DIRECTOR' => 'required|max:65',
            'ALUMNOS' => 'numeric',
            'ALUMNAS' => 'numeric',
            'TOTAL' => 'numeric',
            'MAESTROS' => 'numeric',
            'MULTIGRADO' => 'boolean',
            'opf' => 'boolean', ///'max:35',
            //'id_fase' => 'numeric',
            'cuenta_carta' => 'boolean',
            'latitud' => 'numeric',
            'longitud' => 'numeric',
            'certificacion' => 'boolean',
            'acta_anuencia' => 'boolean',
            'electricidad' => 'boolean',
            'seguridad' => 'boolean',
            'status' => 'required|min:2|max:15',
            'observaciones' => 'max:350',
            'correo' => 'email|max:50',
            'modalidad' => 'max:45',
        ]);
        $query=establecimientos::findOrFail($id);
        //$query->cod_establecimiento = $request->cod_establecimiento;
        $query->cod_depto = $request->cod_depto;
        $query->cod_mupio = $request->cod_mupio;
        $query->ESTABLECIMIENTO = $request->ESTABLECIMIENTO;

        $query->cod_nivel = $request->cod_nivel;
        $query->DIRECCION = $request->DIRECCION;
        $query->TELEFONO = $request->TELEFONO;
        $query->SECTOR = $request->SECTOR;

        $query->AREA = $request->AREA;
        $query->JORNADA = $request->JORNADA;
        $query->DIRECTOR = $request->DIRECTOR;
        $query->ALUMNOS = $request->ALUMNOS;

        $query->ALUMNAS = $request->ALUMNAS;
        $query->TOTAL = $request->ALUMNAS + $request->ALUMNOS;
        $query->MAESTROS = $request->MAESTROS;
        $query->MULTIGRADO = $request->MULTIGRADO;
        $query->opf = $request->opf;

        $query->cuenta_carta = $request->cuenta_carta;
        $query->latitud = $request->latitud;
        $query->longitud = $request->longitud;
        $query->certificacion = $request->certificacion;
        $query->acta_anuencia = $request->acta_anuencia;
        $query->electricidad = $request->electricidad;
        $query->seguridad = $request->seguridad;
        $query->status = $request->status;
        $query->observaciones = $request->observaciones;
        $query->correo = $request->correo;
        $query->modalidad = $request->modalidad;
        $query->update();

        return Redirect::to('model/establecimientos');
    }

    public function destroy ($id){
        if($this->VerificarModi()){
            return new Response(view('unauthorized')->with('role', 'Administrador o permisos para editar'));
        }
    	$query=establecimientos::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/establecimientos');//nomodel/annos
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
