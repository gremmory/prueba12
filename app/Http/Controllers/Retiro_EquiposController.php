<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimientos;
use App\Dispositivos;
use App\Retiro_Equipos;
use App\Http\Requests\Retiro_EquiposFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class Retiro_EquiposController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$consulta=DB::table('retiro_equipos')
            ->where('tipo_equipo', 'LIKE', $query . '%')
    		->orderBy('tipo_equipo', 'desc')
            ->paginate(10)
    		;
    		return view('model.retiro_equipos.index', ["retiro_equipos"=>$consulta, "searchText"=>$query]);
    	}
    }

    public function create (){
    	$dispositivos = dispositivos::all();
  		$establecimientos = establecimientos::all();

    	return view ('model.retiro_equipos.create', 
    		[
    			'dispositivos'=> $dispositivos,
    			'establecimientos'=>$establecimientos,
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

    public function Insetar (Retiro_EquiposFormRequest $request){
    	$query= new Retiro_Equipos($request->all());
		$query->save();
		 return Redirect::to('model/retiro_equipos');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.retiro_equipos.show", ["retiro_equipos"=>retiro_equipos::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.retiro_equipos.edit", 
    		[
    			"retiro_equipos"=>retiro_equipos::findOrFail($id), 
    			'establecimientos'=> establecimientos::all(),
    			'dispositivos'=>dispositivos::all()
    		]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            //'cod_establecimiento' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|max:12',
            //'Fecha_Retiro' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|date_format:Y-m-d',
            //'tipo_equipo' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|max:5',
            'Descrip_Retiro' => '',
            'No_Serie' => 'required|max:30',
            'NomRetiro' => 'required|max:100',
            'Nomentrega' => 'required|max:10',
            'Fecha_Entrega' => 'date_format:Y-m-d',
        ]);
        $query=retiro_equipos::findOrFail($id);
        //$query->cod_establecimiento = $request->cod_establecimiento;
        $query->Descrip_Retiro = $request->Descrip_Retiro;
        $query->No_Serie = $request->No_Serie;
        $query->NomRetiro = $request->NomRetiro;

        $query->Nomentrega = $request->Nomentrega;
        $query->Fecha_Entrega = $request->Fecha_Entrega;
        $query->update();

        return Redirect::to('model/retiro_equipos');
    }

    public function destroy ($id){
    	$query=retiro_equipos::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/retiro_equipos');//nomodel/annos
    }
}
