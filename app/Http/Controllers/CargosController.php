<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Cargos;
use App\Requests\CargosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CargosController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$cargos=DB::table('cargos')

            ->where('Descripcion_Cargo', 'LIKE', $query . '%')
    		->orderBy('Descripcion_Cargo', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('nomodel.cargos.index', ["cargos"=>$cargos, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('nomodel.cargos.create');
    }

    public function store (A $request){
        return "Puto";
    	$cargos= new annos;
    	$cargos->Descripcion_Cargo = $request->get('Descripcion_Cargo');
    	$cargos->save();
    	return Redirect::to('nomodel/cargos');
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'Descripcion_Cargo' => 'required|unique:cargos,Descripcion_Cargo|max:50',
        ]);
        /*
        $existencia = DB::table('cargos')
            ->select('Descripcion_Cargo')
            ->where('Descripcion_Cargo', '=', $request->Descripcion_Cargo)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/cargos/create')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }
        */
        $cargos= new Cargos;
        $cargos->Descripcion_Cargo = $request->Descripcion_Cargo;
        $cargos->save();
        return Redirect::to('nomodel/cargos');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("nomodel.cargos.show", ["cargos"=>cargos::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("nomodel.cargos.edit", ["cargos"=>cargos::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Descripcion_Cargo' => 'required|unique:cargos,Descripcion_Cargo|max:50',
        ]);
        $existencia = DB::table('cargos')
            ->select('Descripcion_Cargo')
            ->where('Descripcion_Cargo', '=', $request->Descripcion_Cargo)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/cargos/' . $id . '/edit')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }

        $cargos=cargos::findOrFail($id);
        $cargos->Descripcion_Cargo=$request->Descripcion_Cargo;
        $cargos->update();

        return Redirect::to('nomodel/cargos');
    }

    public function destroy ($id){
        //return "puto2";
    	$cargos=cargos::findOrFail($id);
    	$cargos->delete();
    	return Redirect::to('nomodel/cargos');//nomodel/annos
    }
}
