<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use App\Models\Cursos;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $update =0;
        $cursos = Cursos::get();
        $profes = Profesores::orderBy('id', 'DESC')->paginate(6);
        return view('profes.addProfe', compact('profes','cursos','update'));
    }


    public function store(Request $request)
    {

        //return $request->all();
        if ($request->hasFile('foto_profesor')) {
            $file = $request->file('foto_profesor');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosProfes/'),$nombrearchivo); 

            $data = new Profesores([
                'nameFull'=>$request->get('nameFull'),
                'cedula'=>$request->get('cedula'),
                'phone'=>$request->get('phone'),
                'email'=>$request->get('email'),
                'profesion'=>$request->get('profesion'),
                'foto_profesor'=>$nombrearchivo,
                'curso_id'=>$request->get('curso_id')
            ]);
            $data->save(); 
        }else{
            $data = new Profesores([
                'nameFull'=>$request->get('nameFull'),
                'cedula'=>$request->get('cedula'),
                'phone'=>$request->get('phone'),
                'email'=>$request->get('email'),
                'profesion'=>$request->get('profesion'),
                'curso_id'=>$request->get('curso_id')
            ]);
            $data->save(); 
        }

        return redirect('/profe/create')->with('RegisterProfe','Profesor Guardado Satisfactoriamente');
    }

    public function show(Request $request, $id)
    {
        $prof = Profesores::findOrFail($id);
        return view('profes.view', compact('prof'));
    }


    public function edit($id)
    {
        $update =1;
        $profe = Profesores::findOrFail($id);
        $profeidCurso = $profe->curso_id;
        $cursos = Cursos::all();

        return view('profes.addProfe', compact('profe','cursos','update','profeidCurso'));  

    }


    public function update(Request $request, $id)
    {

        if ($request->hasFile('foto_profesor')) {
            $file = $request->file('foto_profesor');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosProfes/'),$nombrearchivo); 

            $profe = Profesores::findOrFail($id);
            $profe->nameFull        = $request->nameFull;
            $profe->cedula          = $request->cedula;
            $profe->phone           = $request->phone;
            $profe->email           = $request->email;
            $profe->profesion       = $request->profesion;
            $profe->curso_id        = $request->curso_id;
            $profe->foto_profesor   = $nombrearchivo;
            
            $profe->save();
        }else{
            $profe = Profesores::findOrFail($id);
            $profe->nameFull        = $request->nameFull;
            $profe->cedula          = $request->cedula;
            $profe->phone           = $request->phone;
            $profe->email           = $request->email;
            $profe->profesion       = $request->profesion;
            $profe->curso_id        = $request->curso_id;
            
            $profe->save();
        }
        
        $update = 0;
        $cursos = Cursos::get();
        $profes = Profesores::orderBy('id', 'DESC')->paginate(3);
        return view('profes.addProfe', compact('profes','cursos','update'));

    }


    public function destroy(Profesores $profesores, $id){

        $profes = Profesores::findOrFail($id);
        $profes->delete($id);

        $update =0;
        $cursos = Cursos::get();
        $profes = Profesores::orderBy('id', 'DESC')->paginate(6);

        $successDelete ="Sede Borrada correctamente.";
        return view('profes.addProfe', compact('successDelete','profes','cursos','update'));
    }

}