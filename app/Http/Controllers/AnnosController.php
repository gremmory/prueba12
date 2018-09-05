<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\annos;
use App\Requests\AnnosFormRequest;
use Illuminate\Support\Facades\Redirect;
//use prueba1\App\Http\Requests\AnnosFormRequest;
use Illuminate\Support\Facades\DB;

class AnnosController extends Controller
{
    //

    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$annos=DB::table('annos')

            ->where('anno', 'LIKE', $query . '%')
    		->orderBy('anno', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('nomodel.annos.index', ["annos"=>$annos, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('nomodel.annos.create');
    }

    public function store (AnnosFormRequest $request){
        return "Puto";
    	$annos= new annos;
    	$annos->anno = $request->get('anno');
    	$annos->save();


        $pre = new annos;
        $pre->anno = 2015;
        if($pre->save()){
            return "Hola mundo";
        }
    	return Redirect::to('nomodel/annos');
    }

    public function Insetar (Request $request){
        $validatedData = $request->validate([
            'anno' => 'required|unique:annos,anno|numeric|min:4',
        ]);

        //$this->validate($request, $rules);
        /*
        if ($validatedData->fails()) {
            return Redirect::to('nomodel/annos')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                //->withInput()
                ;
        }
        */
        $existencia = DB::table('annos')
            ->select('anno')
            ->where('anno', '=', $request->anno)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/annos/create')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }
        $annos= new annos;
        $annos->anno = $request->anno;
        $annos->save();
        return Redirect::to('nomodel/annos');
    }

    public function show ($id){
    	return view("nomodel.annos.show", ["annos"=>annos::findOrFail($id)]);
    }

    public function edit ($id){
    	return view("nomodel.annos.edit", ["annos"=>annos::findOrFail($id)]);
    }
    /*
    public function update (AnnosFormRequest $request, $id){
        $validatedData = $request->validate([
            'anno' => 'required|unique:annos,anno|numeric|min:4',
        ]);
        $existencia = DB::table('annos')
            ->select('anno')
            ->where('anno', '=', $request->anno)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/annos/' . $id . '/edit')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }

    	$annos=annos::findOrFail($id);
    	$annos->annos=$request->annos;
    	$annos->update();

    	return Redirect::to('nomodel/annos');
    }
    */

    public function update (Request $request, $id){
        $validatedData = $request->validate([
            'anno' => 'required|unique:annos,anno|numeric|min:4',
        ]);
        $existencia = DB::table('annos')
            ->select('anno')
            ->where('anno', '=', $request->anno)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/annos/' . $id . '/edit')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }

        $annos=annos::findOrFail($id);
        $annos->anno=$request->anno;
        $annos->update();

        return Redirect::to('nomodel/annos');
    }

    public function Actualizar (Request $request, $id){
        $validatedData = $request->validate([
            'anno' => 'required|unique:annos,anno|numeric|min:4',
        ]);
        $existencia = DB::table('annos')
            ->select('anno')
            ->where('anno', '=', $request->anno)
            ->get();

        if(count($existencia) >= 1) {
            //$validatedData->errors()->add('anno', 'error message');
            return Redirect::to('nomodel/annos/' . $id . '/edit')
                ->withErrors($validatedData)
                //->withInput(Input::except('password'))
                ->withInput()
                ;
        }


        $annos=annos::findOrFail($id);
        $annos->annos=$request->anno;
        $annos->update();

        return Redirect::to('nomodel/annos');
    }

    public function destroy ($id){
        //return "puto2";
    	$annos=annos::findOrFail($id);
    	$annos->delete();
    	return Redirect::to('nomodel/cargos');//nomodel/annos
    }

    public function destroyer ($id){
        return "puto";
        $annos=annos::findOrFail($id);
        $annos->delete();
        return Redirect::to('nomodel/cargos');//nomodel/annos
    }
}



/* 

 {{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}
{!! Form::open(array('url'=> '/nomodel/annos/delete/' . $an->id_anno,  'method'=>'GET', 'autocomplete'=>'off')) !!}
{{!! Form::open (array('action'=>array('AnnosController@destroy', $an->id_anno), 'method'=>'DELETE', 'id'=>'hola', 'name'=>'hola')) !!}}
{!! Form::close() !!}



               




            {!! Form::open(array('url'=> 'nomodel/annos', 'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="anno"></label>
                <input type="number" name="anno" class="form-control" placeholder="Año ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}




            {{ Form::open(array('url' => 'nomodel/annos')) }}

            <div class="form-group">
                {{ Form::label('name', 'anno') }}
                {{ Form::text('name', Input::old('anno'), array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
            {{ Form::reset('Cancelar', array('class' => 'btn btn-danger')) }}
            {!! Form::close() !!}

*/

