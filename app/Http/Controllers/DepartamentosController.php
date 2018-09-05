<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;
use App\Requests\DepartamentosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class DepartamentosController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$departamentos=DB::table('departamentos')

            ->where('Desc_Deptos', 'LIKE', $query . '%')
    		->orderBy('Desc_Deptos', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.departamentos.index', ["departamentos"=>$departamentos, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.departamentos.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'cod_Depto' => 'required|unique:departamentos,cod_Depto|min:2',
            'Desc_Deptos' => 'required|unique:departamentos,Desc_Deptos|max:100',
        ]);
        $existencia = DB::table('departamentos')
            ->select('Desc_Deptos')
            ->where('cod_Depto', '=', $request->cod_Depto)
            ->orWhere('Desc_Deptos', '=', $request->Desc_Deptos)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/departamentos/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $query= new Departamentos;//.php
        $query->cod_Depto = $request->cod_Depto;
        $query->Desc_Deptos = $request->Desc_Deptos;
        $query->save();
        return Redirect::to('model/departamentos');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.departamentos.show", ["departamentos"=>departamentos::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.departamentos.edit", ["departamentos"=>departamentos::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Desc_Deptos' => 'required|unique:departamentos,Desc_Deptos|max:100',
        ]);
        $existencia = DB::table('departamentos')
            ->select('Desc_Deptos')
            ->where('Desc_Deptos', '=', $request->Desc_Deptos)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/departamentos' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }

        $query=departamentos::findOrFail((string)$id);
        $query->Desc_Deptos=$request->Desc_Deptos;
        $query->update();

        return Redirect::to('model/departamentos');
    }

    public function destroy ($id){
    	$query=departamentos::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/departamentos');//nomodel/annos
    }
}
