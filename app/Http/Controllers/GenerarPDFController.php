<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
use App\Departamentos;
use App\Municipios;
use Illuminate\Support\Facades\DB;
class GenerarPDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generar()

    {

        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('pdf/vista_previa', $data);
        return $pdf->download('hdtuto.pdf');

    }

    public function getFases_Depto(Request $request, $id){
        if($request->ajax()){
            //retorna las fases de un departamento
            $fases = DB::table("departamentos")
                ->join('establecimientos', 'establecimientos.cod_depto', '=', 'departamentos.cod_Depto')
                ->join('detalle_equipo', 'detalle_equipo.cod_establecimiento', '=', 'establecimientos.cod_establecimiento')
                ->join('fases', 'fases.Id_Fase', '=', 'detalle_equipo.Fases_Id_Fase')
                ->select("fases.Id_Fase", "fases.Nombre")
                ->where('departamentos.cod_Depto', '=', $id)
                ->groupBy('fases.Id_Fase', 'fases.Nombre')

                ->get()->toArray();
            return response()->json($fases);
        }
    }

    public function getEducativa(Request $request, $id){
        if($request->ajax()){
            //retorna las fases de un departamento
            $educativa = DB::table("fases")
                ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                ->select(DB::raw(
                    "fases.Id_Fase, fases.Nombre, count(*) as educativa, detalle_equipo.desc_equipo, marcas.Desc_Marca"
                ))
                ->where('fases.Id_Fase', '=', $id)
                ->whereRaw("detalle_equipo.tipo = 'NETBOOK EDUCATIVA'")
                ->groupBy('fases.Id_Fase', 'fases.Nombre', 'detalle_equipo.desc_equipo', 'marcas.Desc_Marca')
                ->get()->toArray();
            return response()->json($educativa);
        }
    }

    public function getDocente(Request $request, $id){
        if($request->ajax()){
            //retorna las fases de un departamento
            $docente = DB::table("fases")
                ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                ->select(DB::raw(
                    "fases.Id_Fase, fases.Nombre, count(*) as educativa, detalle_equipo.desc_equipo, marcas.Desc_Marca"
                ))
                ->where('fases.Id_Fase', '=', $id)
                ->whereRaw("detalle_equipo.tipo = 'Laptop para docentes'")
                ->groupBy('fases.Id_Fase', 'fases.Nombre', 'detalle_equipo.desc_equipo', 'marcas.Desc_Marca')
                ->get()->toArray();
            return response()->json($docente);
        }
    }

    public function getServidor(Request $request, $id){
        if($request->ajax()){
            //retorna las fases de un departamento
            $servidor = DB::table("fases")
                ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                ->select(DB::raw(
                    "fases.Id_Fase, fases.Nombre, count(*) as educativa, detalle_equipo.desc_equipo, marcas.Desc_Marca"
                ))
                ->where('fases.Id_Fase', '=', $id)
                ->whereRaw("detalle_equipo.tipo = 'servidor de contenido'")
                ->groupBy('fases.Id_Fase', 'fases.Nombre', 'detalle_equipo.desc_equipo', 'marcas.Desc_Marca')
                ->get()->toArray();
            return response()->json($servidor);
        }
    }
    public function getEnrutador(Request $request, $id){
        if($request->ajax()){
            //retorna las fases de un departamento
            $enrutador = DB::table("fases")
                ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                ->select(DB::raw(
                    "fases.Id_Fase, fases.Nombre, count(*) as educativa, detalle_equipo.desc_equipo, marcas.Desc_Marca"
                ))
                ->where('fases.Id_Fase', '=', $id)
                ->whereRaw("detalle_equipo.tipo = 'enrutador inalámbrico'")
                ->groupBy('fases.Id_Fase', 'fases.Nombre', 'detalle_equipo.desc_equipo', 'marcas.Desc_Marca')
                ->get()->toArray();
            return response()->json($enrutador);
        }
    }

    public function getAll(Request $request, $id, $dpt){
        if($request->ajax()){

            $todos = DB::table("fases")
                    ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                    ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                    ->join('establecimientos', 'establecimientos.cod_establecimiento', '=', 'detalle_equipo.cod_establecimiento')
                    ->select(DB::raw(
                        "fases.Id_Fase, fases.Nombre, detalle_equipo.desc_equipo, marcas.Desc_Marca, detalle_equipo.tipo, detalle_equipo.cod_equipo, detalle_equipo.series"
                    ))
                    ->where('fases.Id_Fase', '=', $id)
                    ->whereRaw("establecimientos.cod_depto = '" . $dpt . "'")
                    ->orderBy('detalle_equipo.tipo', 'DESC')
                    ;
            $ax = clone $todos;
            $edu = $ax->whereRaw("detalle_equipo.tipo = 'NETBOOK EDUCATIVA'")->get()->toArray();
            $ax = clone $todos;
            $doc = $ax->whereRaw("detalle_equipo.tipo = 'Laptop para docentes'")->get()->toArray();
            $ax = clone $todos;
            $ser = $ax->whereRaw("detalle_equipo.tipo = 'servidor de contenido'")->get()->toArray();
            $ax = clone $todos;
            $rou = $ax->whereRaw("detalle_equipo.tipo = 'enrutador inalámbrico'")->get()->toArray();
            return response()->json(['edu' => $edu, 
                                    'doc' => $doc, 
                                    'ser' => $ser, 
                                    'rou' => $rou
                                    ]);
        }
    }
    public function vista (){
        /*
        $todos = DB::table("fases")
                ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                ->select(DB::raw(
                    "fases.Id_Fase, fases.Nombre, detalle_equipo.desc_equipo, marcas.Desc_Marca, detalle_equipo.tipo, detalle_equipo.cod_equipo, detalle_equipo.series"
                ))
                ->where('fases.Id_Fase', '=', 1)
                ->orderBy('detalle_equipo.tipo', 'DESC')
                ;
        $ax = clone $todos;
            $edu = $ax->whereRaw("detalle_equipo.tipo = 'NETBOOK EDUCATIVA'")->get()->toArray();
            $ax = clone $todos;
            $doc = $ax->whereRaw("detalle_equipo.tipo = 'Laptop para docentes'")->get()->toArray();
            $ax = clone $todos;
            $ser = $ax->whereRaw("detalle_equipo.tipo = 'servidor de contenido'")->get()->toArray();
            $ax = clone $todos;
            $rou = $ax->whereRaw("detalle_equipo.tipo = 'enrutador inalámbrico'")->get()->toArray();

        return ['edu' => $edu, 
                                    'doc' => $doc, 
                                    'ser' => $ser, 
                                    'rou' => $rou
                                    ];
        
        */
        $departamentos = departamentos::all();
        return view('pdf.vista_previa', ["departamentos"=>$departamentos]);//DB::table('departamentos')->get()
    }

    public function crearvista (Request $request){
        $validatedData = $request->validate([
            'num_acta' => 'required',
            'hora_letra' => 'required',
            'min_letra' => 'required',
            'hora_min' => 'required',
            'direc_dep' => 'required',
            'tercero_par' => 'required',
            'cuarto_par' => 'required',
            'quinto_valor' => 'required',
            'parA' => '',
            'reg_dona' => 'required',
            'hora2_letra' => 'required',
            'min2_letra' => 'required',
            'hora_min_2' => 'required',
            'encargado_inv' => 'required',
            'direc_depto' => 'required',
        ]);
        $data = [
            'num_acta' => (string)$request->num_acta,
            'hora_letra' => $request->hora_letra,
            'min_letra' => $request->min_letra,
            'hora_min' => $request->hora_min,
            'direc_dep' => $request->direc_dep,
            'tercero_par' => $request->tercero_par,
            'cuarto_par' => $request->cuarto_par,
            'quinto_valor' => $request->quinto_valor,
            'parA' => $request->parA,
            'reg_dona' => $request->reg_dona,
            'hora2_letra' => $request->hora2_letra,
            'min2_letra' => $request->min2_letra,
            'hora_min_2' => $request->hora_min_2,
            'encargado_inv' => $request->encargado_inv,
            'direc_depto' => $request->direc_depto
    ];
        $pdf = PDF::loadView('/pdf/actapdf', $data);
        return $pdf->download('acta_generated.pdf');
    }

}