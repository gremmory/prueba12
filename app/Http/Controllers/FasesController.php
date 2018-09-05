<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fases;
use App\Requests\FasesFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class FasesController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		//$consulta=DB::table('fases')
            $consulta= fases::where('Descripcion', 'LIKE', $query . '%')
    		->orderBy('Descripcion', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.fases.index', ["fases"=>$consulta, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.fases.create', ["proveedores"=>DB::table('proveedores')->get()]);
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'Descripcion' => 'required|max:100',
            'Fecha_Inicio' => 'date_format:Y-m-d',
            'Cooperador' => 'required|max:50',
            //'Id_Proveedor' => 'required|numeric',
            'Id_Proveedor' => '',
            'Nombre' => 'required|max:100',
        ]);
        $query= new Fases;//.php
        $query->Descripcion = $request->Descripcion;
        $query->Fecha_Inicio = $request->Fecha_Inicio;
        $query->Nombre = $request->Nombre;
        $query->Cooperador = $request->Cooperador;
        $query->save();
        return Redirect::to('model/fases');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.fases.show", ["fases"=>fases::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.fases.edit", ["fases"=>fases::findOrFail($id), "proveedores"=>DB::table('proveedores')->get()]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Descripcion' => 'required|max:100',
            'Fecha_Inicio' => 'date_format:Y-m-d',
            'Cooperador' => 'required|max:50',
            //'Id_Proveedor' => 'required|numeric',
            'Id_Proveedor' => '',
            'Nombre' => 'required|max:100',
        ]);
        $query=fases::findOrFail((string)$id);
        $query->Descripcion = $request->Descripcion;
        $query->Fecha_Inicio = $request->Fecha_Inicio;
        $query->Cooperador = $request->Cooperador;
        $query->Id_Proveedor = $request->Id_Proveedor;
        $query->Nombre = $request->Nombre;
        $query->update();

        return Redirect::to('model/fases');
    }

    public function destroy ($id){
    	$query=fases::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/fases');//nomodel/annos
    }
}
