<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pagos;
use App\Models\Cursos;
use App\Models\Alumnos;
use Illuminate\Http\Request;

class PagosController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

        $cursos = Cursos::all();
        $alumnos = Alumnos::all();
        return view('pagos.add', compact('alumnos','cursos'));   
    }


    public function store(Request $request)
    {

        if($request->ajax()){
            $data = Alumnos::select("id")
            ->where("id",$request->alumno_id)
            ->get();

            $data1=Alumnos::all();

            $states = DB::table('alumnos')->where("id",$request->alumno_id)->get();
            //return response()->json($states);

            $alumno = DB::table('alumnos')
            ->get();
        
            return response()->json([
                'mensaje'=> $data1
            ]);  
        }

    }


    public function show(Request $request)
    {

    }


    public function edit(Pagos $pagos)
    {
        //
    }


    public function update(Request $request, Pagos $pagos)
    {
        //
    }

  
    public function destroy(Pagos $pagos)
    {
        //
    }
}
