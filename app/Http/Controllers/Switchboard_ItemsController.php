<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Switchboard_Items;
use App\Http\Requests\Switchboard_ItemsFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests;

class Switchboard_ItemsController extends Controller
{
    public function __construct(){

    }

    public function index (Request $request){
    	if($request){
    		//busqueda por categoria
    		$query=trim($request->get('searchText'));
    		$switchboard_items=DB::table('switchboard_items')
            ->where('ItemText', 'LIKE', $query . '%')
    		->orderBy('ItemText', 'desc')
            ->paginate(10)
    		;
    		//
    		//->where
    		return view('model.switchboard_items.index', ["switchboard_items"=>$switchboard_items, "searchText"=>$query]);
    	}
    }

    public function create (){
    	return view ('model.switchboard_items.create');
    }

    public function store (Switchboard_ItemsFormRequest $request){
    	
    }

    public function Insetar (Switchboard_ItemsFormRequest $request){
        /*
        $validatedData = $request->validate([
            'SwitchboardID' => 'required|unique_with:switchboard_items,SwitchboardID,ItemNumber|numeric',
            'ItemNumber' => 'required|unique_with:switchboard_items,SwitchboardID,ItemNumber|numeric',
            'ItemText' => 'required|max:350',
            'Command' => 'numeric',
            'Argument' => 'required|max:350',
        ]);
		*/
		$switchboard_items= new Switchboard_Items($request->all());
		$switchboard_items->save();
		 return Redirect::to('model/switchboard_items');
		 /*
        $validatedData = $request->all();//$request->validated();
		if ($validatedData->fails()) {
            return Redirect::to('model/switchboard_items/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
        $switchboard_items->create($validatedData);
        */
/*
        $validatedData = $request->validated();//$request->all();
        $validatedData->save();
        return back();

/*		
        $existencia = DB::table('switchboard_items')
            ->select('ItemText')
            ->where('ItemText', '=', $request->ItemText)
            ->get();

        if(count($existencia) >= 1) {
            return Redirect::to('model/switchboard_items/create')
                ->withErrors($validatedData)
                ->withInput()
                ;
        }
*/
        /*
        $switchboard_items= new Switchboard_Items;//.php
        $switchboard_items->SwitchboardID = $request->SwitchboardID;
        $switchboard_items->ItemNumber = $request->ItemNumber;
        $switchboard_items->ItemText = $request->ItemText;
        $switchboard_items->Command = $request->Command;
        $switchboard_items->Argument = $request->Argument;
        $switchboard_items->save();
        return Redirect::to('model/switchboard_items');
        */
    }//@include('nomodel.cargos.modal')

	public function show ($id){
    	return view("model.switchboard_items.show", ["switchboard_items"=>switchboard_items::findOrFail($id)]);
    }

		/*
		$switchboard_items=DB::table('switchboard_items')
            ->where('switchboardid', '=', $id1)
            ->where('itemnumber', '=', $id2)
            ->first()
    		;
*/
    		//return serialize($switchboard_items);
    	//$data = json_decode($switchboard_items->getBody()->getContents())[0];

    	//$switchboard_items = DB::select('SELECT * FROM switchboard_items WHERE switchboardid = ' . $id1 . ' and ' .'itemnumber' . ' = ' . $id2);

	public function edit ($id){
    	return view("model.switchboard_items.edit", ["switchboard_items"=> switchboard_items::findOrFail($id) ] );
    }

    public function edito ($id){
    	return view("model.switchboard_items.edit", ["switchboard_items"=> switchboard_items::findOrFail($id) ] );
    }

    public function update (Request $request, $id1, $id2){
    	
        $validatedData = $request->validate([
            //'SwitchboardID' => 'required|unique_with:switchboard_items,SwitchboardID,ItemNumber|numeric',
            //'ItemNumber' => 'required|unique:switchboard_items,SwitchboardID,ItemNumber|numeric',
            'ItemText' => 'required|max:350',
            'Command' => 'numeric',
            'Argument' => 'required|max:350',
        ]);

        
        
        $switchboard_items = switchboard_items::where('switchboardid', $id1)->where('itemnumber', $id2)->update(
            array(
                'ItemText' => $request->ItemText,
                'Command' => $request->Command,
                'Argument' => $request->Argument,
            )
        );//.php
        //$switchboard_items->SwitchboardID = $request->SwitchboardID;
        //$switchboard_items->ItemNumber = $request->ItemNumber;

        
        //$switchboard_items->save();

        return Redirect::to('model/switchboard_items');
    }

    public function destroy ($id1, $id2){
    	switchboard_items::where('switchboardid', $id1)->where('itemnumber', $id2)->delete();
    	//$switchboard_items=switchboard_items::findOrFail('switchboardid'=> $id1, 'itemnumber' => $id2);
    	//$switchboard_items->delete();
    	return Redirect::to('model/switchboard_items');//nomodel/annos
    }
}
