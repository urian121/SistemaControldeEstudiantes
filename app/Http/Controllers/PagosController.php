<?php

namespace App\Http\Controllers;

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
            //$alumno = Alumnos::findOrFail($id);
           // return view('pagos.add', compact('alumno'));
            dd($request->all());
            return response()->json([
                'mensaje'=> '<p>' .$request->all().'</p>'
            ]);  
        }
    }


    public function show(Request $request, $id)
    {
       
        if($request->ajax()){
            $alumno = Alumnos::findOrFail($id);
           // return view('pagos.add', compact('alumno'));

            return response()->json([
                'mensaje'=> '<strong>Felicitaciones ! </strong> El Profesor fue Borrado.'
            ]);  
        }

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
