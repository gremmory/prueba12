<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesiones;
use App\Requests\ProfesionesFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProfesionesController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$profesiones=DB::table('profesiones')

            ->where('profesion', 'LIKE', $query . '%')
    		->orderBy('profesion', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.profesiones.index', ["profesiones"=>$profesiones, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.profesiones.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'id_prefesion' => 'required|unique:profesiones,id_prefesion|min:2',
            'profesion' => 'required|unique:profesiones,profesion|max:100',
        ]);
        $existencia = DB::table('profesiones')
            ->select('profesion')
            ->where('id_prefesion', '=', $request->id_prefesion)
            ->orWhere('profesion', '=', $request->profesion)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/profesiones/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $profesiones= new Profesiones;//.php
        $profesiones->profesion = $request->profesion;
        $profesiones->id_prefesion = $request->id_prefesion;
        $profesiones->save();
        return Redirect::to('model/profesiones');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.profesiones.show", ["profesiones"=>profesiones::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.profesiones.edit", ["profesiones"=>profesiones::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'profesion' => 'required|unique:profesiones,profesion|max:100',
        ]);
        $existencia = DB::table('profesiones')
            ->select('profesion')
            ->where('profesion', '=', $request->profesion)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/profesiones' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }

        $profesiones=profesiones::findOrFail((string)$id);
        $profesiones->profesion=$request->profesion;
        $profesiones->update();

        return Redirect::to('model/profesiones');
    }

    public function destroy ($id){
    	$profesiones=profesiones::findOrFail($id);
    	$profesiones->delete();
    	return Redirect::to('model/profesiones');//nomodel/annos
    }
}
