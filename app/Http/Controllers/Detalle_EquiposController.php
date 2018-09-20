<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_Equipos;
use App\Establecimientos;
use App\Niveles;
use App\Fases;
use App\Marcas;
use App\Dispositivos;
use App\Http\Requests\Detalle_EquiposFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class Detalle_EquiposController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		//$consulta=DB::table('detalle_equipo')

            $consulta = detalle_equipos::where('cod_equipo', 'LIKE', $query . '%')
    		->orderBy('cod_equipo', 'desc')
            ->paginate(10)
    		;
    		return view('model.detalle_equipos.index', ["detalle_equipos"=>$consulta, "searchText"=>$query]);
    	}
    }

    public function create (){
    	$establecimientos = establecimientos::all();
  		$fases = fases::all();
  		$niveles = niveles::all();
  		$marcas = marcas::all();
  		$dispositivos = dispositivos::all();

    	return view ('model.detalle_equipos.create', 
    		[
    			'establecimientos'=> $establecimientos,
    			'fases'=>$fases, 
    			'niveles'=>$niveles,
    			'marcas'=>$marcas,
    			'dispositivos'=>$dispositivos
    		]);
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Detalle_EquiposFormRequest $request){
    	$detalle_equipos= new Detalle_Equipos($request->all());
		$detalle_equipos->save();
		 return Redirect::to('model/detalle_equipos');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.detalle_equipos.show", ["detalle_equipos"=>Detalle_Equipos::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.detalle_equipos.edit", 
    		[
    			'detalle_equipos' => detalle_equipos::findOrFail($id),
    			"establecimientos"=>establecimientos::all(), 
    			'marcas'=> marcas::all(),
    			'fases'=>fases::all(), 
    			'niveles'=>niveles::all(), 
    			'dispositivos'=>dispositivos::all()
    		]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            //'cod_establecimiento' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:12',
            //'cod_equipo' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:20',
            //'tipo_equipo' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:5',
            'desc_equipo' => 'max:100',
            'id_marca' => '',
            'series' => '',
            'cantidad' => 'numeric',
            'Observaciones' => '',
            'Fases_Id_Fase' => 'required|numeric',
            'tipo' => 'max:60',
        ]);
        $query=detalle_equipos::findOrFail($id);

        //$query->cod_establecimiento = $request->cod_establecimiento;
        //$query->cod_equipo = $request->cod_equipo;
        //$query->tipo_equipo = $request->tipo_equipo;
        $query->desc_equipo = $request->desc_equipo;
        $query->id_marca = $request->id_marca;
        $query->series = $request->series;
        $query->cantidad = $request->cantidad;
        $query->Observaciones = $request->Observaciones;
        $query->Fases_Id_Fase = $request->Fases_Id_Fase;
        $query->tipo = $request->tipo;
        $query->update();

        return Redirect::to('model/detalle_equipos');
    }

    public function destroy ($id){
    	$query=detalle_equipos::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/detalle_equipos');//nomodel/annos
    }
}
