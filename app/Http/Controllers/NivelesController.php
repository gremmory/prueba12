<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveles;
use App\Requests\NivelesFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class NivelesController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$niveles=DB::table('niveles')

            ->where('desc_nivel', 'LIKE', $query . '%')
    		->orderBy('desc_nivel', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.niveles.index', ["niveles"=>$niveles, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.niveles.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'cod_nivel' => 'required|unique:niveles,cod_nivel|min:2|max:2',
            'desc_nivel' => 'required|unique:niveles,desc_nivel|max:50',
        ]);
        $existencia = DB::table('niveles')
            ->select('desc_nivel')
            ->where('cod_nivel', '=', $request->cod_nivel)
            ->orWhere('desc_nivel', '=', $request->desc_nivel)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/niveles/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $query= new Niveles;//.php
        $query->cod_nivel = $request->cod_nivel;
        $query->desc_nivel = $request->desc_nivel;
        $query->save();
        return Redirect::to('model/niveles');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.niveles.show", ["niveles"=>niveles::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.niveles.edit", ["niveles"=>niveles::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'desc_nivel' => 'required|unique:niveles,desc_nivel|max:50',
        ]);
        $existencia = DB::table('niveles')
            ->select('desc_nivel')
            ->where('desc_nivel', '=', $request->desc_nivel)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/niveles' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }

        $query=niveles::findOrFail((string)$id);
        $query->desc_nivel=$request->desc_nivel;
        $query->update();

        return Redirect::to('model/niveles');
    }

    public function destroy ($id){
    	$query=niveles::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/niveles');//nomodel/annos
    }
}
