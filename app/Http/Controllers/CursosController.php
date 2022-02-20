<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{

    public function index()
    {
       /*   
        $cursos = Cursos::orderBy('id', 'DESC')->paginate(5);
        return view('cursos', compact('cursos'));
        */
    }

    public function create()
    {
        $cursos = Cursos::orderBy('id', 'DESC')->paginate(3);
        return view('cursos.add', compact('cursos'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'precio_curso' => 'required'
        ]);

        
        Cursos::create($request->all());

       // $cursos = Cursos::orderBy('id', 'DESC')->paginate(5);
        //return view('cursos', compact('cursos'));
        return redirect()->route('curso.create')->with('mensaje','Curso Registrado');
        
    }

    public function show(Cursos $cursos)
    {
        //
    }


    public function edit(Cursos $cursos)
    {
        //
    }


    public function update(Request $request, Cursos $cursos)
    {
        //
    }


    public function destroy(Cursos $cursos)
    {
        $cursos->delete();
        //Post::where('id', $id)->delete();
        return redirect('/curso/create')->with('success', 'Game Data is successfully deleted');
    }
}
