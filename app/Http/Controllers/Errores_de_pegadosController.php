<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Errores_de_pegados;
use App\Requests\Errores_de_pegadosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class Errores_de_pegadosController extends Controller
{
public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$errores_de_pegados=DB::table('errores_de_pegado')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.errores_de_pegados.index', ["errores_de_pegados"=>$errores_de_pegados, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.errores_de_pegados.create');
    }

    public function store (Request $request){
    	//
    }

    public function Insetar (Request $request){
        $query= new Errores_de_pegados;//.php
        $query->Campo0   = $request->Campo0 ;
        $query->Campo1   = $request->Campo1 ;
        $query->Campo2   = $request->Campo2 ;
        $query->Campo3   = $request->Campo3 ;
        $query->Campo4   = $request->Campo4 ;
        $query->Campo5   = $request->Campo5 ;
        $query->Campo6   = $request->Campo6 ;
        $query->Campo7   = $request->Campo7 ;
        $query->Campo8   = $request->Campo8 ;
        $query->Campo9   = $request->Campo9 ;
        $query->Campo10  = $request->Campo10    ;
        $query->Campo11  = $request->Campo11    ;
        $query->Campo12  = $request->Campo12    ;
        $query->Campo13  = $request->Campo13    ;
        $query->Campo14  = $request->Campo14    ;
        $query->Campo15  = $request->Campo15    ;
        $query->Campo16  = $request->Campo16    ;
        $query->Campo17  = $request->Campo17    ;
        $query->Campo18  = $request->Campo18    ;
        $query->Campo19  = $request->Campo19    ;
        $query->Campo20  = $request->Campo20    ;
        $query->Campo21  = $request->Campo21    ;
        $query->Campo22  = $request->Campo22    ;
        $query->Campo23  = $request->Campo23    ;
        $query->Campo24  = $request->Campo24    ;
        $query->Campo25  = $request->Campo25    ;
        $query->Campo26  = $request->Campo26    ;
        $query->Campo27  = $request->Campo27    ;
        $query->Campo28  = $request->Campo28    ;
        $query->Campo29  = $request->Campo29    ;
        $query->Campo30  = $request->Campo30    ;


        $query->save();
        return Redirect::to('model/errores_de_pegados');
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return Redirect::to('model/errores_de_pegados');
    }

	public function edit ($id){
    	return Redirect::to('model/errores_de_pegados');
    }

    public function update (Request $request, $id){
        return Redirect::to('model/errores_de_pegados');
    }

    public function destroy ($id){
    	return Redirect::to('model/errores_de_pegados');//nomodel/annos
    }
}
