<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;
use App\Requests\ProveedoresFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$query_general=DB::table('proveedores')

            ->where('Nombre_Pro', 'LIKE', $query . '%')
    		->orderBy('Nombre_Pro', 'desc')
            ->paginate(10)
    		;
    		return view('model.proveedores.index', ["proveedores"=>$query_general, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.proveedores.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'Nombre_Pro' => 'required|max:50',
            'Direccion_Prov' => 'required|max:100',
            'Tel_Prov' => 'required|max:12',
            'Nomcontacto1' => 'max:50',
            'Nomcontacto2' => 'max:50',
            'e_mail' => 'max:35',
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
        $proveedores= new Proveedores;//.php
        $proveedores->Nombre_Pro = $request->Nombre_Pro;
        $proveedores->Direccion_Prov = $request->Direccion_Prov;
        $proveedores->Tel_Prov = $request->Tel_Prov;
        $proveedores->Nomcontacto1 = $request->Nomcontacto1;
        $proveedores->Nomcontacto2 = $request->Nomcontacto2;
        $proveedores->e_mail = $request->e_mail;
        $proveedores->save();
        return Redirect::to('model/proveedores');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.proveedores.show", ["proveedores"=>proveedores::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.proveedores.edit", ["proveedores"=>proveedores::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Nombre_Pro' => 'required|max:50',
            'Direccion_Prov' => 'required|max:100',
            'Tel_Prov' => 'required|max:12',
            'Nomcontacto1' => 'max:50',
            'Nomcontacto2' => 'max:50',
            'e_mail' => 'max:35',
        ]);
/*
        $existencia = DB::table('marcas')
            ->select('Desc_Marca')
            ->where('Desc_Marca', '=', $request->Desc_Marca)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/proveedores' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
*/
        $proveedores=proveedores::findOrFail($id);
        $proveedores->Nombre_Pro = $request->Nombre_Pro;
        $proveedores->Direccion_Prov = $request->Direccion_Prov;
        $proveedores->Tel_Prov = $request->Tel_Prov;
        $proveedores->Nomcontacto1 = $request->Nomcontacto1;
        $proveedores->Nomcontacto2 = $request->Nomcontacto2;
        $proveedores->e_mail = $request->e_mail;
        $proveedores->update();

        return Redirect::to('model/proveedores');
    }

    public function destroy ($id){
    	$proveedores=proveedores::findOrFail($id);
    	$proveedores->delete();
    	return Redirect::to('model/proveedores');//nomodel/annos
    }
}
