<?php

namespace App\Http\Controllers;

use App\Models\hospitales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalesController extends Controller
{

    public function index()
    {
        //
        $datos= DB::table('hospitales')->get();

        if (count($datos) === 0){
            $hospital1 = new Hospitales();
            $hospital1->cod_hospital = '4020';
            $hospital1->nombre = 'Hospital mentiras';
            $hospital1->save();

            $hospital2 = new Hospitales();
            $hospital2->cod_hospital = '1234';
            $hospital2->nombre = 'Hospital Dario';
            $hospital2->save();
            //echo "si entra";
            return redirect()->route("pacientes.index");
        }else
        return view('hospitales', compact('datos'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $hospitales = new Hospitales();
        $hospitales->cod_hospital = $request->post('cod_hospital');
        $hospitales->nombre = $request->post('nombre');

        $hospitales->save();

        return redirect()->route("hospitales.index")->with("success", "agregado con exito");
    }

    public function show($cod_hospital)
    {
        //
        $hospital= DB::table('hospitales')->where('cod_hospital', $cod_hospital)->first();
        return view('eliminarHospital', compact('hospital'));
    }

    public function edit($cod_hospital)
    {
        //
        $hospital= DB::table('hospitales')->where('cod_hospital', $cod_hospital)->first();
        return view('actualizarHospital', compact('hospital'));
    }

    public function update(Request $request, $cod_hospital)
    {
        //
        $hospitales = new Hospitales();
        $hospitales->cod_hospital = $request->post('cod_hospital');
        $hospitales->nombre = $request->post('nombre');

        $hospitales= DB::table('hospitales')->where('cod_hospital', $cod_hospital)
                    ->update(['cod_hospital' => $hospitales->cod_hospital,
                            'nombre' => $hospitales->nombre]);
        
        return redirect()->route("hospitales.index")->with("success", "agregado con exito");
    }

    public function destroy($cod_hospital)
    {
        //
        $hospitales= DB::table('hospitales')->where('cod_hospital', $cod_hospital)->delete();
        return redirect()->route("hospitales.index")->with("success", "agregado con exito");
    }
}
