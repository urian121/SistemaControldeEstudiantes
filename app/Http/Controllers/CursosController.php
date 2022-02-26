<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
        $cursosTable = Cursos::orderBy('id', 'DESC')->paginate(3);
        $cursosTotal = Cursos::all();
        // $table->timestamps();
        return view('cursos.add', compact('cursosTable','cursosTotal','update'));        
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
        $curso = Cursos::find($id);
        $curso->nombre_curso       = $request->nombre_curso;
        $curso->precio_curso     = $request->precio_curso;

        $curso->save();

        /**Cargando datos para redireccionar a la vista con datos predeterminados */
        $update =0;
        $cursosTable = Cursos::orderBy('id', 'DESC')->paginate(3);
        $cursosTotal = Cursos::all();
$mensaje ="Hola";
        return view('cursos.add', compact('cursosTable','cursosTotal','update','mensaje'));  
    }


    public function destroy($id)
    {
        $cursos = Cursos::findOrFail($id);
        $cursos->delete();
        return redirect('/curso/create')->with('mensaje', 'El Curso fue Borrado correctamente.');
    }
}
