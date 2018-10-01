<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsuariosFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\User;
//use RegistersUsers;

class UsuariosController extends Controller
{
	public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$query_general=DB::table('users')
            ->where('Nombres', 'LIKE', $query . '%')
            ->orWhere('Apellidos', 'LIKE', $query . '%')
    		->orderBy('Nombres', 'desc')
            ->paginate(10)
    		;
    		return view('model.usuarios.index', ["usuarios"=>$query_general, "searchText"=>$query]);
    	}
    }

    public function Insetar (UsuariosFormRequest $request){
        $usuarios= new User($request->all());
        $usuarios->password = Hash::make($request['password']);
        $usuarios->save();
        return Redirect::to('model/usuarios');

        return Redirect::to('model/proveedores');
    }

    public function create (){
    	return view ('model.usuarios.create');
    }

    public function store (UsuariosFormRequest $request){
    	$usuarios= new Usuarios($request->all());
		$usuarios->save();
		 return Redirect::to('model/usuarios');
    }

	public function show ($id){
    	return view("model.usuarios.show", ["usuarios"=>user::findOrFail($id)]);
    }

	public function edit ($id){
    	return view("model.usuarios.edit", ["usuarios"=>user::findOrFail($id)]);
    }

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'Apellidos' => 'required|string|max:100', 
            'Nombres' => 'required|string|max:100', 
            //'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed', 
            'permite_ver' => 'boolean', 
            'permite_modif' => 'boolean', 
            'permite_agregar' => 'boolean', 
            'admin' => 'boolean',
        ]);

        //$validatedData = $request->validated();

        $usuarios=user::findOrFail($id);
        $usuarios->Apellidos = $request->Apellidos;
        $usuarios->Nombres = $request->Nombres;
        //$usuarios->email = $request->email;
        $usuarios->password = Hash::make($request->password);
        $usuarios->permite_ver = $request->permite_ver;
        $usuarios->permite_modif = $request->permite_modif;
        $usuarios->permite_agregar = $request->permite_agregar;
        $usuarios->admin = $request->admin;
        $usuarios->update();

        return Redirect::to('model/usuarios');
    }

    public function destroy ($id){
    	$usuarios=user::findOrFail($id);
    	$usuarios->delete();
    	return Redirect::to('model/usuarios');//nomodel/annos
    }
}
