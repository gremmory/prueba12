<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
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

    public function vista (){
        return view('pdf.vista_previa');
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