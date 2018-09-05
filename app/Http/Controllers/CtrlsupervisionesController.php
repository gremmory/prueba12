<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ctrlsupervisiones;
use App\Http\Requests\CtrlsupervisionesFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CtrlsupervisionesController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$query_general=DB::table('ctrlsupervision')
            ->where('nomsupervisor', 'LIKE', $query . '%')
            ->orWhere('numsupervision', 'LIKE', $query . '%')
    		->orderBy('nomsupervisor', 'desc')
            ->paginate(10)
    		;
    		return view('model.ctrlsupervisiones.index', ["ctrlsupervision"=>$query_general, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.ctrlsupervisiones.create', ["establecimientos"=> DB::table('establecimientos')->get()]);
    }

    public function store (CtrlsupervisionesFormRequest $request){
    	$ctrlsupervision= new Ctrlsupervisiones ($request->all());
		$ctrlsupervision->save();
		 return Redirect::to('model/ctrlsupervisiones');
    }

    public function Insetar (CtrlsupervisionesFormRequest $request){

    	$ctrlsupervision= new Ctrlsupervisiones ($request->all());
		$ctrlsupervision->save();
		 return Redirect::to('model/ctrlsupervisiones');


        $validatedData = $request->validate([
            'cod_establecimiento' => 'required|unique:ctrlsupervision,cod_establecimiento|max:12',
            'numsupervision' => 'required|numeric',
            'nomsupervisor' => 'required|max:50',
            'fecha_inicio' => 'date_format:Y-m-d',
            'fecha_fin' => 'date_format:Y-m-d',
            'actividades' => '',
            'observaciones' => '',
            'recomendaciones' => '',
        ]);
        /*
        $existencia = DB::table('proveedores')
            ->select('Desc_Marca')
            ->where('Desc_Marca', '=', $request->Desc_Marca)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/proveedores/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        */
        $ctrlsupervision= new Ctrlsupervisiones;//.php
        $ctrlsupervision->cod_establecimiento = $request->cod_establecimiento;
        $ctrlsupervision->numsupervision = $request->numsupervision;
        $ctrlsupervision->nomsupervisor = $request->nomsupervisor;
        $ctrlsupervision->fecha_inicio = $request->fecha_inicio;
        $ctrlsupervision->fecha_fin = $request->fecha_fin;
        $ctrlsupervision->actividades = $request->actividades;
        $ctrlsupervision->observaciones = $request->observaciones;
        $ctrlsupervision->recomendaciones = $request->recomendaciones;
        $ctrlsupervision->save();
        return Redirect::to('model/ctrlsupervisiones');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.ctrlsupervisiones.show", ["ctrlsupervision"=>ctrlsupervisiones::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.ctrlsupervisiones.edit", [
            "ctrlsupervisiones"=>ctrlsupervisiones::findOrFail($id),
            "establecimientos"=> DB::table('establecimientos')->get()
        ]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            //'cod_establecimiento' => 'required|unique:ctrlsupervision,cod_establecimiento|max:12',
            //'numsupervision' => 'required|numeric',
            'nomsupervisor' => 'required|max:50',
            'fecha_inicio' => 'date_format:Y-m-d',
            'fecha_fin' => 'date_format:Y-m-d',
            'actividades' => '',
            'observaciones' => '',
            'recomendaciones' => '',
        ]);

        //$validatedData = $request->validated();

        $ctrlsupervision=Ctrlsupervisiones::findOrFail($id);
        $ctrlsupervision->nomsupervisor = $request->nomsupervisor;
        $ctrlsupervision->fecha_inicio = $request->fecha_inicio;
        $ctrlsupervision->fecha_fin = $request->fecha_fin;
        $ctrlsupervision->actividades = $request->actividades;
        $ctrlsupervision->observaciones = $request->observaciones;
        $ctrlsupervision->recomendaciones = $request->recomendaciones;
        $ctrlsupervision->update();

        return Redirect::to('model/ctrlsupervisiones');
    }

    public function destroy ($id){
    	$ctrlsupervision=Ctrlsupervisiones::findOrFail($id);
    	$ctrlsupervision->delete();
    	return Redirect::to('model/ctrlsupervisiones');//nomodel/annos
    }
}
