<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marcas;
use App\Requests\MarcasFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class MarcasController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$marcas=DB::table('marcas')

            ->where('Desc_Marca', 'LIKE', $query . '%')
    		->orderBy('Desc_Marca', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.marcas.index', ["marcas"=>$marcas, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.marcas.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'Desc_Marca' => 'required|unique:marcas,Desc_Marca|max:50',
        ]);
        $existencia = DB::table('marcas')
            ->select('Desc_Marca')
            ->where('Desc_Marca', '=', $request->Desc_Marca)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/marcas/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $marcas= new Marcas;//.php
        $marcas->Desc_Marca = $request->Desc_Marca;
        $marcas->save();
        return Redirect::to('model/marcas');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.marcas.show", ["marcas"=>marcas::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.marcas.edit", ["marcas"=>marcas::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Desc_Marca' => 'required|unique:marcas,Desc_Marca|max:50',
        ]);
        $existencia = DB::table('marcas')
            ->select('Desc_Marca')
            ->where('Desc_Marca', '=', $request->Desc_Marca)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/marcas' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }

        $marcas=marcas::findOrFail((string)$id);
        $marcas->Desc_Marca=$request->Desc_Marca;
        $marcas->update();

        return Redirect::to('model/marcas');
    }

    public function destroy ($id){
    	$marcas=marcas::findOrFail($id);
    	$marcas->delete();
    	return Redirect::to('model/marcas');//nomodel/annos
    }
}
