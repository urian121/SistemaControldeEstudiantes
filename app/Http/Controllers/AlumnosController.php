<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use DB;

use App\Models\Alumnos;

use App\Models\Cursos;

use App\Models\Profesores;


class AlumnosController extends Controller
{
    
    public function index()
    {
        $alumnosTotal = Alumnos::all();

        $alumnos = Alumnos::orderBy('id', 'DESC')->paginate(3);
        return view('alumnos.index', compact('alumnos','alumnosTotal'));

    }


    public function create()
    {
        $cursos = Cursos::get();
        #$user = User::where('name', 'John')->first();
        #$cursos = Cursos::all();
        $profesores = Profesores::orderBy('id','asc')->get();
        //$alumnos = Alumnos::orderBy('id', 'DESC')->paginate(3);
        
        return view('alumnos.add',compact('cursos','profesores'));

    }

    
    public function store(Request $request)
    {

        /*
            return $request('nameFullAlumno');
            return $request->all();
        */

        if ($request->hasFile('foto_estudiante')) {
            $file = $request->file('foto_estudiante');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosAlumnos/'),$nombrearchivo); 

            $data = new Alumnos([
                'nameFullAlumno'=>$request->get('nameFullAlumno'),
                'cedula_alumno'=>$request->get('cedula_alumno'),
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
        }else{
            $data = new Alumnos([
                'nameFullAlumno'=>$request->get('nameFullAlumno'),
                'cedula_alumno'=>$request->get('cedula_alumno'),
                'email_alumno'=>$request->get('email_alumno'),
                'ciudad'=>$request->get('ciudad'),
                'phone_alumno'=>$request->get('phone_alumno'),
                'edad_alumno'=>$request->get('edad_alumno'),
                'addres'=>$request->get('addres'),
                'curso_id'=>$request->get('curso_id'),
                'profesor_id'=>$request->get('profesor_id'),
                 
            ]);
            $data->save(); 
        } 

        return redirect('/alumno/create')->with('mensaje','Alumno Registrado Correctamente.');

    }

    
    public function show(Request $request, $id)
    {
        $alumno = Alumnos::findOrFail($id);
        return view('alumnos.view', compact('alumno'));
    }

    
    public function edit(Alumnos $alumnos)
    {
        //
    }

    
    public function update(Request $request, Alumnos $alumnos)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        $alumno = Alumnos::findOrFail($id);
        $alumno->delete();
        return redirect('/alumno')->with('mensaje', 'El alumno fue borrado correctamente.');
    }
}
