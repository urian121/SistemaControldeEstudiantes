<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $profes = Profesores::orderBy('id', 'DESC')->paginate(3);
        return view('profes.addProfe', compact('profes'));
    }


    public function store(Request $request)
    {
        if ($request->hasFile('foto_profesor')) {
            $file = $request->file('foto_profesor');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosProfes/'),$nombrearchivo); 
        } 


        $data = new Profesores([
            'nameFull'=>$request->get('nameFull'),
            'cedula'=>$request->get('cedula'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email'),
            'profesion'=>$request->get('profesion'),
            'foto_profesor'=>$nombrearchivo,
            'curso_id '=>$request->get('curso_id ')
        ]);
        $data->save(); 
        return redirect('/profe/create')->with('mensaje','Profesor Guardado Satisfactoriamente');
    }


    public function show(Profesores $profesores)
    {
        //
    }


    public function edit(Profesores $profesores)
    {
        //
    }


    public function update(Request $request, Profesores $profesores)
    {
        //
    }


    public function destroy(Profesores $profesores)
    {
        $profesores->delete();
        return redirect()->route('profe.create')->with('success','Post deleted successfully');

    }

}