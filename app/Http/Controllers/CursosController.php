<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Cursos;


class CursosController extends Controller
{

    public function index()
    {
       /*   
        $total = profesores::all()->count();
        $cursos = Cursos::orderBy('id', 'DESC')->paginate(5);
        return view('cursos', compact('cursos'));
        */
    }

    public function create()
    {
        $update =0;
        $cursosTable = Cursos::orderBy('id', 'DESC')->paginate(6);
        $cursosTotal = Cursos::all();
        return view('cursos.add', compact('cursosTable','cursosTotal','update'));        
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'nombre_curso' => 'required|max:255',
            'precio_curso' => 'required|min:3|max:50',
            'dateCurso' =>'required'
        ],
        [
            'nombre_curso.required' => 'Nombre del Curso es obligatorio',
            'precio_curso.required' => 'El Precio es obligatorio',
            'dateCurso.required' => 'La fecha es obligatorio'
        ]);
        
        $guardar = Cursos::create($validatedData);
        return redirect()->route('curso.create')->with('msjRegist','Curso Registrado');
        
    }

    public function edit($id)
      {
        $update =1;
        $curso       = Cursos::findOrFail($id);
        $cursosTable = Cursos::orderBy('id', 'DESC')->paginate(3);
        $cursosTotal = Cursos::all();
        return view('cursos.add', compact('curso','cursosTable','cursosTotal','update'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre_curso' => 'required|max:255',
            'precio_curso' => 'required',
            'dateCurso' =>'required'
        ]);
        
        Cursos::whereId($id)->update($validatedData);

        /**Cargando datos para redireccionar a la vista con datos predeterminados */
        $update =0;
        $cursosTable = Cursos::orderBy('id', 'DESC')->paginate(3);
        $cursosTotal = Cursos::all();
        return view('cursos.add', compact('cursosTable','cursosTotal','update'));  
    }


    public function destroy($id)
    {
        $cursos = Cursos::findOrFail($id);
        $cursos->delete();
        return redirect('/curso/create')->with('msjDelete', 'El Curso fue Borrado correctamente.');
    }
}
