<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispositivos;
use App\Requests\DispositivosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class DispositivosController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
        if($request){
            //busqueda por categoria
            $query=trim($request->get('searchText'));
            $dispositivos=DB::table('dispositivos')

            ->where('Desc_tipoequipo', 'LIKE', $query . '%')
            ->orderBy('Desc_tipoequipo', 'desc')
            ->paginate(10)
            ;
            //
            //->where
            return view('model.dispositivos.index', ["dispositivos"=>$dispositivos, "searchText"=>$query]);
        }
    }

    public function create (){
        return view ('model.dispositivos.create');
    }

    public function store (Request $request){
        //
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'tipo_equipo' => 'required|unique:dispositivos,tipo_equipo|max:5',
            'Desc_tipoequipo' => 'required|unique:dispositivos,Desc_tipoequipo|max:50',
        ]);
        /*
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
        */
        $dispositivos= new Dispositivos;//.php
        $dispositivos->tipo_equipo = $request->tipo_equipo;
        $dispositivos->Desc_tipoequipo = $request->Desc_tipoequipo;
        $dispositivos->save();
        return Redirect::to('model/dispositivos');
    }//@include('nomodel.cargos.modal')

    public function show ($id){
        return view("model.dispositivos.show", ["dispositivos"=>dispositivos::findOrFail($id)]);
    }

    public function edit ($id){
        return view("model.dispositivos.edit", ["dispositivos"=>dispositivos::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Desc_tipoequipo' => 'required|unique:dispositivos,Desc_tipoequipo|max:50',
        ]);
        /*
        $existencia = DB::table('dispositivos')
            ->select('dispositivos')
            ->where('Desc_tipoequipo', '=', $request->Desc_tipoequipo)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/dispositivos' . $id . '/edit')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        */
        $dispositivos=dispositivos::findOrFail((string)$id);
        $dispositivos->Desc_tipoequipo=$request->Desc_tipoequipo;
        $dispositivos->update();

        return Redirect::to('model/dispositivos');
    }

    public function destroy ($id){
        $dispositivos=dispositivos::findOrFail($id);
        $dispositivos->delete();
        return Redirect::to('model/dispositivos');//nomodel/annos
    }
}
