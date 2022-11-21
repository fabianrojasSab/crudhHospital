<?php

namespace App\Http\Controllers;

use App\Models\gestionHospitalaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionHospitalariaController extends Controller
{
    public function index()
    {
        //
        $datos= DB::table('gestion_hospitalarias')->get();
        return view('gestionHospitalaria', compact('datos'));
    }

    public function create(Request $request)
    {
        //
        $no_documento = $request->input('no_documento');
        $paciente = DB::table('pacientes')->where('no_documento', $no_documento)->first();
        $hospitales = DB::table('hospitales')->get();
        //$paciente2 = var_dump($paciente);
        $res = $hospitales->push($paciente);
        //echo $res2 = var_dump($res);
        if($paciente === null){
            return view('advertenciaGestionHospitalaria');
        }
        //print_r($paciente) ;
        return view('hospitalizacion', compact('res'));
    }

    public function store(Request $request)
    {
        //
        $gestionHospitalaria = new GestionHospitalaria();
        $gestionHospitalaria->no_doc_paciente = $request->post('no_doc_paciente');
        $gestionHospitalaria->tipo_documento = $request->post('tipo_documento');
        $gestionHospitalaria->cod_hospital = $request->post('cod_hospital');
        $gestionHospitalaria->fec_ingreso = $request->post('fec_ingreso');
        $gestionHospitalaria->save();   

        //echo $gestionHospitalaria;
        return redirect()->route("gestionhospitalaria.index")->with("success", "agregado con exito");
    }

    public function show($id)
    {
        //
        $gestionHospitalaria= DB::table('gestion_hospitalarias')->where('id_hospitalizacion', $id)->first();
        $res = $gestionHospitalaria;
        //print_r($id) ;
        return view('eliminarGestionHospitalaria', compact('res'));
        
    }

    public function edit($id)
    {
        //
        $gestionHospitalaria= DB::table('gestion_hospitalarias')->where('id_hospitalizacion', $id)->first();
        $hospitales = DB::table('hospitales')->get();
        $res = $hospitales->push($gestionHospitalaria);
        //print_r($res) ;
        return view('actualizar_hospitalizacion', compact('res'));
    }

    public function update(Request $request, $id)
    {
        //
        $gestionHospitalaria = new GestionHospitalaria();
        $gestionHospitalaria->tipo_documento = $request->post('tipo_documento');
        $gestionHospitalaria->no_doc_paciente = $request->post('no_doc_paciente');
        $gestionHospitalaria->cod_hospital = $request->post('cod_hospital');
        $gestionHospitalaria->fec_ingreso = $request->post('fec_ingreso');
        $gestionHospitalaria->fec_salida = $request->post('fec_salida');
        
        $gestionHospitalaria= DB::table('gestion_hospitalarias')->where('id_hospitalizacion', $id)
                    ->update(['tipo_documento' => $gestionHospitalaria->tipo_documento,
                            'no_doc_paciente' => $gestionHospitalaria->no_doc_paciente,
                            'cod_hospital' => $gestionHospitalaria->cod_hospital,
                            'fec_ingreso' => $gestionHospitalaria->fec_ingreso,
                            'fec_salida' => $gestionHospitalaria->fec_salida]);

        //echo $id;
        return redirect()->route("gestionhospitalaria.index")->with("success", "agregado con exito");
    }

    public function destroy($id)
    {
        //
        $gestionHospitalaria= DB::table('gestion_hospitalarias')->where('id_hospitalizacion', $id)->delete();
        return redirect()->route("gestionhospitalaria.index")->with("success", "agregado con exito");
    }
}