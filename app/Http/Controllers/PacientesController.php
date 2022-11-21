<?php

namespace App\Http\Controllers;

use App\Models\pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    
    public function index()
    {
        //
        $datos= DB::table('pacientes')->get();
        //echo $datos;
        return view('welcome', compact('datos'));
    }

    
    public function create()
    {
        //
        
    }

    public function store(Request $request)
    {
        // 
        $pacientes = new Pacientes();
        $pacientes->no_documento = $request->post('no_documento');
        $pacientes->tipo_documento = $request->post('tipo_documento');
        $pacientes->nombres = $request->post('nombres');
        $pacientes->apellidos = $request->post('apellidos');
        $pacientes->fec_nacimiento = $request->post('fec_nacimiento');
        $pacientes->email = $request->post('email');
        $pacientes->save();

        //echo $pacientes;
        return redirect()->route("pacientes.index")->with("success", "agregado con exito");
    }

    public function show($no_documento)
    {
        //
        $paciente= DB::table('pacientes')->where('no_documento', $no_documento)->first();
        //echo $paciente;
        return view('eliminarPaciente', compact('paciente'));
    }

    public function edit($no_documento)
    {
        //
        $paciente= DB::table('pacientes')->where('no_documento', $no_documento)->first();
        //print_r( $paciente);
        return view('actualizar', compact('paciente'));

    }

    public function update(Request $request, $no_documento)
    {
        //
        $pacientes = new Pacientes();
        $pacientes->no_documento = $request->post('no_documento');
        $pacientes->tipo_documento = $request->post('tipo_documento');
        $pacientes->nombres = $request->post('nombres');
        $pacientes->apellidos = $request->post('apellidos');
        $pacientes->fec_nacimiento = $request->post('fec_nacimiento');
        $pacientes->email = $request->post('email');

        $pacientes= DB::table('pacientes')->where('no_documento', $no_documento)
                    ->update(['no_documento' => $pacientes->no_documento,
                            'nombres' => $pacientes->nombres,
                            'apellidos' => $pacientes->apellidos,
                            'fec_nacimiento' => $pacientes->fec_nacimiento,
                            'email' => $pacientes->email]);

        return redirect()->route("pacientes.index")->with("success", "agregado con exito");
    }

    public function destroy($no_documento)
    {
        //
        $pacientes= DB::table('pacientes')->where('no_documento', $no_documento)->delete();
        return redirect()->route("pacientes.index")->with("success", "agregado con exito");
    }
}
