<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornadas;
use App\Requests\JornadasFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class JornadasController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$jornadas=DB::table('jornadas')

            ->where('Desc_jornada', 'LIKE', $query . '%')
    		->orderBy('Desc_jornada', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.jornadas.index', ["jornadas"=>$jornadas, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.jornadas.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'Desc_jornada' => 'required|unique:jornadas,Desc_jornada|max:45',
        ]);
        $existencia = DB::table('jornadas')
            ->select('Desc_jornada')
            ->where('Desc_jornada', '=', $request->cod_nivel)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/jornadas/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $query= new Jornadas;//.php
        $query->Desc_jornada = $request->Desc_jornada;
        $query->save();
        return Redirect::to('model/jornadas');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.jornadas.show", ["jornadas"=>jornadas::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.jornadas.edit", ["jornadas"=>jornadas::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Desc_jornada' => 'required|unique:jornadas,Desc_jornada|max:45',
        ]);
        $existencia = DB::table('jornadas')
            ->select('Desc_jornada')
            ->where('Desc_jornada', '=', $request->Desc_jornada)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/jornadas' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }

        $query=jornadas::findOrFail($id);
        $query->Desc_jornada=$request->Desc_jornada;
        $query->update();

        return Redirect::to('model/jornadas');
    }

    public function destroy ($id){
    	$query=jornadas::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/jornadas');//nomodel/annos
    }
}
