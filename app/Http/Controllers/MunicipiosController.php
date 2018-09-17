<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipios;
use App\Requests\MunicipiosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class MunicipiosController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
            /*
    		$municipios=DB::table('municipios')

            ->where('NOM_MUPIO', 'LIKE', $query . '%')
    		->orderBy('NOM_MUPIO', 'desc')
            ->paginate(10)
    		;
            */

            $municipios = municipios::where('NOM_MUPIO', 'LIKE', $query . '%')
            ->orderBy('NOM_MUPIO', 'desc')
            ->paginate(25)
            //->get()
            ;
    		return view('model.municipios.index', ["municipios"=>$municipios, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.municipios.create', ["departamentos"=>DB::table('departamentos')->get()]);
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'COD_DEPTO' => 'required|min:2',
            'COD_MUPIO' => 'required|unique:municipios,COD_MUPIO|min:2|max:5',
            'NOM_MUPIO' => 'required|unique_with:municipios,COD_MUPIO,NOM_MUPIO|max:50',
        ]);
        /*
        $existencia = DB::table('departamentos')
            ->select('Desc_Deptos')
            ->where('cod_Depto', '=', $request->cod_Depto)
            ->orWhere('Desc_Deptos', '=', $request->Desc_Deptos)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/municipios/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        */
        $query= new Municipios;//.php
        $query->COD_DEPTO = $request->COD_DEPTO;
        $query->COD_MUPIO = $request->COD_MUPIO;
        $query->NOM_MUPIO = $request->NOM_MUPIO;
        $query->save();
        return Redirect::to('model/municipios');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.municipios.show", ["municipios"=>municipios::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.municipios.edit", ["municipios"=>municipios::findOrFail($id), "departamentos"=>DB::table('departamentos')->get()]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'COD_DEPTO' => 'required|min:2',
            'NOM_MUPIO' => 'required|unique_with:municipios,COD_MUPIO,NOM_MUPIO|max:50',
        ]);
        /*
        $existencia = DB::table('departamentos')
            ->select('Desc_Deptos')
            ->where('Desc_Deptos', '=', $request->Desc_Deptos)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/municipios' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
		*/
        $query=municipios::findOrFail((string)$id);
        $query->COD_DEPTO=$request->COD_DEPTO;
        $query->NOM_MUPIO=$request->NOM_MUPIO;
        $query->update();

        return Redirect::to('model/municipios');
    }

    public function destroy ($id){
    	$query=municipios::findOrFail($id);
    	$query->delete();
    	return Redirect::to('model/municipios');//nomodel/annos
    }
}
