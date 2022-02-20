<?php
namespace App\Http\Controllers;

use DB;
use App\Models\Alumnos;
use App\Models\Cursos;
use App\Models\Profesores;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    
    public function index()
    {
        $alumnos = Alumnos::orderBy('id', 'DESC')->paginate(3);
        return view('alumnos.index', compact('alumnos'));
    }


    public function create()
    {
        //$alumnos = Alumnos::orderBy('id', 'DESC')->paginate(3);
        return view('alumnos.add');
    }

    
    public function store(Request $request)
    {

        if ($request->hasFile('foto_estudiante')) {
            $file = $request->file('foto_estudiante');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosAlumnos/'),$nombrearchivo); 
        } 

        $data = new Alumnos([
            'nameFullAlumno'=>$request->get('nameFullAlumno'),
            'email_alumno'=>$request->get('email_alumno'),
            'ciudad'=>$request->get('ciudad'),
            'phone_alumno'=>$request->get('phone_alumno'),
            'edad_alumno'=>$request->get('edad_alumno'),
            'addres'=>$request->get('addres'),
            'foto_estudiante'=>$nombrearchivo,
            'curso_id'=>$request->get('curso_id'),
            'profesor_id'=>$request->get('profesor_id'),
             
        ]);
        $data->save(); 
        return redirect('/alumno/create')->with('mensaje','Alumno Guardado Satisfactoriamente');

    }

    
    public function show(Alumnos $alumnos)
    {
        //
    }

    
    public function edit(Alumnos $alumnos)
    {
        //
    }

    
    public function update(Request $request, Alumnos $alumnos)
    {
        //
    }

    public function destroy(Alumnos $alumnos)
    {
        //
    }
}
