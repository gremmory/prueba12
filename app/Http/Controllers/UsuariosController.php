<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Http\Requests\UsuariosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$query_general=DB::table('usuarios')
            ->where('Nombres', 'LIKE', $query . '%')
            ->orWhere('Apellidos', 'LIKE', $query . '%')
    		->orderBy('Nombres', 'desc')
            ->paginate(10)
    		;
    		return view('model.usuarios.index', ["usuarios"=>$query_general, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.usuarios.create');
    }

    public function store (UsuariosFormRequest $request){
    	$usuarios= new Usuarios($request->all());
		$usuarios->save();
		 return Redirect::to('model/usuarios');
    }

    public function Insetar (UsuariosFormRequest $request){
    	$usuarios= new Usuarios($request->all());
		$usuarios->save();
		 return Redirect::to('model/usuarios');



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
    	return view("model.usuarios.show", ["usuarios"=>usuarios::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.usuarios.edit", ["usuarios"=>usuarios::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Apellidos' => 'required|max:50',
            'Nombres' => 'required|max:50',
            'CorreoE' => 'required|email|max:50',
            //'Nomusuario' => 'required|unique:usuarios,Nomusuario|max:20',
            'contrasena' => 'required|max:20',
            'permite_ver' => 'required|boolean',
            'permite_modif' => 'required|boolean',
            'permite_agregar' => 'required|boolean',
        ]);

        //$validatedData = $request->validated();

        $usuarios=usuarios::findOrFail($id);
        $usuarios->Apellidos = $request->Apellidos;
        $usuarios->Nombres = $request->Nombres;
        $usuarios->CorreoE = $request->CorreoE;
        $usuarios->permite_ver = $request->permite_ver;
        $usuarios->permite_modif = $request->permite_modif;
        $usuarios->permite_agregar = $request->permite_agregar;
        $usuarios->update();

        return Redirect::to('model/usuarios');
    }

    public function destroy ($id){
    	$usuarios=usuarios::findOrFail($id);
    	$usuarios->delete();
    	return Redirect::to('model/usuarios');//nomodel/annos
    }
}
