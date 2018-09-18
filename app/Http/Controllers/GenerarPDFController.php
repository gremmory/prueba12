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
                    ->join('establecimientos', 'establecimientos.cod_establecimiento', '=', 'detalle_equipo.cod_establecimiento')
                    ->select(DB::raw(
                        "fases.Id_Fase, fases.Nombre, detalle_equipo.desc_equipo, marcas.Desc_Marca, detalle_equipo.tipo, detalle_equipo.cod_equipo, detalle_equipo.series"
                    ))
                    ->where('fases.Id_Fase', '=', '1')
                    ->whereRaw("establecimientos.cod_depto = '" . '05'. "'")
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

        $t_edu = "";
        $total = count($edu);
        for($i = 0; $i < count($edu); $i++){
            $nuevafila= "<tr><td>" . $edu[$i]->series . "</td>";
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_edu').append(nuevafila);
            $t_edu = $t_edu . $nuevafila;
        }
                $t_edu = "";
        $total = count($edu);
        for($i = 0; $i < count($edu); $i++){
            $nuevafila= "<tr><td>" . $edu[$i]->series . "</td>";
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_edu').append(nuevafila);
            $t_edu = $t_edu . $nuevafila;
        }
        $cant_edu = $cant_edu2 = count($edu);
        $marca_edu;
        $model_edu;
        if(count($edu) > 0){
            $marca_edu = $edu[0]->Desc_Marca;
            $model_edu = $edu[0]->desc_equipo;
        }
        $t_doc = "";
        $total = $total + count($doc);
        for($i = 0; $i < count($doc); $i++){
            $nuevafila= "<tr><td>" . $doc[$i]->series . "</td>";
            $i++;
            if($i < count($doc)){
                $nuevafila = $nuevafila . "<td>" . $doc[$i]->series . "</td>";
            }
            $i++;
            if($i < count($doc)){
                $nuevafila = $nuevafila . "<td>" . $doc[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_doc').append(nuevafila);
            $t_doc = $t_doc . $nuevafila;
        }
        $cant_doc = $cant_doc2 = count($doc);
        $marca_doc;
        $model_doc;
        if(count($doc) > 0){
            $marca_doc = $doc[0]->Desc_Marca;
            $model_doc = $doc[0]->desc_equipo;
        }
        $t_ser = "";
        $total = $total + count($ser);
        for($i = 0; $i < count($ser); $i++){
            $nuevafila= "<tr><td>" . $ser[$i]->series . "</td>";
            $i++;
            if($i < count($ser)){
                $nuevafila = $nuevafila . "<td>" . $ser[$i]->series . "</td>";
            }
            $i++;
            if($i < count($ser)){
                $nuevafila = $nuevafila . "<td>" . $ser[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_ser').append(nuevafila);
            $t_ser = $t_ser . $nuevafila;
        }
        $cant_ser = $cant_ser2 = count($ser);
        $marca_ser;
        $model_ser;
        if(count($ser) > 0){
            $marca_ser = $ser[0]->Desc_Marca;
            $model_ser = $ser[0]->desc_equipo;
        }
        $t_rou = "";
        $total = $total + count($rou);
        for($i = 0; $i < count($rou); $i++){
            $nuevafila= "<tr><td>" . $rou[$i]->series . "</td>";
            $i++;
            if($i < count($rou)){
                $nuevafila = $nuevafila . "<td>" . $rou[$i]->series . "</td>";
            }
            $i++;
            if($i < count($rou)){
                $nuevafila = $nuevafila . "<td>" . $rou[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_ser').append(nuevafila);
            $t_rou = $t_rou . $nuevafila;
        }
        $cant_rou = $cant_rou2 = count($rou);
        $marca_rou;
        $model_rou;
        if(count($rou) > 0){
            $marca_rou = $rou[0]->Desc_Marca;
            $model_rou = $rou[0]->desc_equipo;
        }

        return $t_edu . "<br><br><br>" . $t_doc . "<br><br><br>" . $t_ser . "<br><br><br>" . $t_rou;
        */
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
            'fecha_toda' => 'required',
            'direc_dep' => 'required',
            'cod_depto2' => 'required',
            'num_lab' => 'required',

            'tercero_par' => 'required',
            'cuarto_par' => 'required',
            'quinto_valor' => 'required',
            'parA' => 'required',
            'reg_dona' => 'required',
            'hora2_letra' => 'required',
            'min2_letra' => 'required',
            'hora_min_2' => 'required',
            'encargado_inv' => 'required',
            'direc_depto' => 'required'
        ]);

        $todos = DB::table("fases")
                    ->join('detalle_equipo', 'detalle_equipo.Fases_Id_Fase', '=', 'fases.Id_Fase')
                    ->join('marcas', 'marcas.Id_Marca', '=', 'detalle_equipo.id_marca')
                    ->join('establecimientos', 'establecimientos.cod_establecimiento', '=', 'detalle_equipo.cod_establecimiento')
                    ->select(DB::raw(
                        "fases.Id_Fase, fases.Nombre, detalle_equipo.desc_equipo, marcas.Desc_Marca, detalle_equipo.tipo, detalle_equipo.cod_equipo, detalle_equipo.series"
                    ))
                    ->where('fases.Id_Fase', '=', $request->cod_fase_pdf)
                    ->whereRaw("establecimientos.cod_depto = '" . $request->cod_depto2 . "'")
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

        //$t_edu = '';
        $total = count($edu);

        $cant_edu = $cant_edu2 = count($edu);
        $marca_edu;
        $model_edu;
        if(count($edu) > 0){
            $marca_edu = $edu[0]->Desc_Marca;
            $model_edu = $edu[0]->desc_equipo;
        }
/* ---------------------------------------------*/
        $t_doc = "";
        $total = $total + count($doc);

        $cant_doc = $cant_doc2 = count($doc);
        $marca_doc;
        $model_doc;
        if(count($doc) > 0){
            $marca_doc = $doc[0]->Desc_Marca;
            $model_doc = $doc[0]->desc_equipo;
        }
/* ---------------------------------------------*/
        $t_ser = "";
        $total = $total + count($ser);
        $cant_ser = $cant_ser2 = count($ser);
        $marca_ser;
        $model_ser;
        if(count($ser) > 0){
            $marca_ser = $ser[0]->Desc_Marca;
            $model_ser = $ser[0]->desc_equipo;
        }
        /* ---------------------------------------------*/
        $t_rou = "";
        $total = $total + count($rou);
        $cant_rou = $cant_rou2 = count($rou);
        $marca_rou;
        $model_rou;
        if(count($rou) > 0){
            $marca_rou = $rou[0]->Desc_Marca;
            $model_rou = $rou[0]->desc_equipo;
        }

        $dpt = departamentos::findOrFail($request->cod_depto2);
        $cod_depto2 = "ERROR";
        if($dpt){
            $cod_depto2 = $dpt->Desc_Deptos;
        }
        $data = [

            'num_acta' => $request->num_acta,
            'hora_letra' => $request->hora_letra,
            'min_letra' => $request->min_letra,
            'hora_min' => $request->hora_min,
            'fecha_toda' => $request->fecha_toda,
            'direc_dep' => $request->direc_dep,
            'cod_depto2' => $cod_depto2, // ---------
            'num_lab' => $request->num_lab,

            'cant_edu' => $cant_edu,
            'marca_edu' => $marca_edu,
            'model_edu' => $model_edu,
            'cant_doce' => $cant_doc,
            'marca_doce' => $marca_doc,
            'model_doce' => $model_doc,
            'cant_servi' => $cant_ser,
            'marca_servi' => $marca_ser,
            'model_servi' => $model_ser,
            'cant_rou' => $cant_rou,
            'marca_rou' => $marca_rou,
            'model_rou' => $model_rou,
            'total_equi' => $total,

            'cant_edu2' => $cant_edu2,
            'cant_doc2' => $cant_doc2,
            'cant_ser2' => $cant_ser2,
            'cant_rou2' => $cant_rou2,

            't_edu' => $edu,
            't_doc' => $doc,
            't_ser' => $ser,
            't_rou' => $rou,

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



        /*
        for($i = 0; $i < count($edu); $i++){
            $nuevafila= "<tr><td>" . $edu[$i]->series . "</td>";
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $i++;
            if($i < count($edu)){
                $nuevafila = $nuevafila . "<td>" . $edu[$i]->series . "</td>";
            }
            $nuevafila = $nuevafila . "</tr>";// . $('#t_edu').append(nuevafila);
            $t_edu = $t_edu . $nuevafila;
        }
        */