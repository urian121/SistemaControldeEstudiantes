<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alumnos;
use App\Models\Cursos;
use App\Models\Profesores;
use App\Models\Pagos;



class AlumnosController extends Controller
{
    
    public function index()
    {
        $alumnosTotal = Alumnos::all();
        $alumnos = Alumnos::orderBy('id', 'DESC')->paginate(6);
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
                'lugar_exp_document'=>$request->get('lugar_exp_document'),
                'ref_family'=>$request->get('ref_family'),
                'phone_ref_family'=>$request->get('phone_ref_family'),
                'talla_uniforme'=>$request->get('talla_uniforme'),
                'email_alumno'=>$request->get('email_alumno'),
                'ciudad'=>$request->get('ciudad'),
                'phone_alumno'=>$request->get('phone_alumno'),
                'edad_alumno'=>$request->get('edad_alumno'),
                'addres'=>$request->get('addres'),
                'foto_estudiante'=>$nombrearchivo,
                'observ'=>$request->get('observ'),
                'curso_id'=>$request->get('curso_id'),
                'profesor_id'=>$request->get('profesor_id'),
                 

            ]);
            $data->save(); 
        }else{
            $data = new Alumnos([
                'nameFullAlumno'=>$request->get('nameFullAlumno'),
                'cedula_alumno'=>$request->get('cedula_alumno'),
                'lugar_exp_document'=>$request->get('lugar_exp_document'),
                'ref_family'=>$request->get('ref_family'),
                'phone_ref_family'=>$request->get('phone_ref_family'),
                'talla_uniforme'=>$request->get('talla_uniforme'),
                'email_alumno'=>$request->get('email_alumno'),
                'ciudad'=>$request->get('ciudad'),
                'phone_alumno'=>$request->get('phone_alumno'),
                'edad_alumno'=>$request->get('edad_alumno'),
                'addres'=>$request->get('addres'),
                'observ'=>$request->get('observ'),
                'curso_id'=>$request->get('curso_id'),
                'profesor_id'=>$request->get('profesor_id'),
                 
            ]);
            $data->save(); 
        } 

        return redirect('/alumno')->with('mensaje','Alumno Registrado Correctamente.');

    }

    
    public function show(Request $request, $id){

        $pagosCursoAlumno = Pagos::where('alumno_id',$id)->get();
        $verificarPago = $pagosCursoAlumno->count();
   
        if($verificarPago !=0){
            $sumaPagoTotal  = Pagos::where('alumno_id',$id)->sum('aporte');
            $SqlvalorCurso = Pagos::where('alumno_id',$id)->limit(1)->get();
            $valorCurso = ($SqlvalorCurso[0]->valor_curso);
            $alumno = Alumnos::findOrFail($id);
            return view('alumnos.view', compact('alumno', 'pagosCursoAlumno','sumaPagoTotal','valorCurso'));
        }else{
            $pagosCursoAlumno = 0;
            $alumno = Alumnos::findOrFail($id); 
            return view('alumnos.view', compact('alumno','pagosCursoAlumno'));
        }
        
        
    }
    
    public function edit($id){

        $alumno   = Alumnos::findOrFail($id);
        $cursos   = Cursos::get();
        $profesores = Profesores::orderBy('id','asc')->get();

        $CursoAsignadoBD = $alumno->curso_id;
        $ProfeAsignadoBD = $alumno->profesor_id;

        return view('alumnos.update',compact('alumno','cursos','profesores','CursoAsignadoBD','ProfeAsignadoBD'));
    }


    public function update(Request $request, $id)
    {
  
        if ($request->hasFile('foto_estudiante')) {
            $file = $request->file('foto_estudiante');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotosAlumnos/'),$nombrearchivo); 

            $alumno = Alumnos::findOrFail($id);
            $alumno->nameFullAlumno         = $request->nameFullAlumno;
            $alumno->cedula_alumno          = $request->cedula_alumno;
            $alumno->lugar_exp_document     = $request->lugar_exp_document;
            $alumno->ref_family             = $request->ref_family;
            $alumno->phone_ref_family       = $request->phone_ref_family;
            $alumno->talla_uniforme         = $request->talla_uniforme;
            $alumno->email_alumno           = $request->email_alumno;
            $alumno->ciudad                 = $request->ciudad;
            $alumno->phone_alumno           = $request->phone_alumno;
            $alumno->edad_alumno            = $request->edad_alumno;
            $alumno->addres                 = $request->addres;
            $alumno->foto_estudiante        = $request->$nombrearchivo;
            $alumno->observ                 = $request->observ;
            $alumno->curso_id               = $request->curso_id;
            $alumno->profesor_id            = $request->profesor_id;

            $alumno->save(); 
        }else{
            $alumno = Alumnos::findOrFail($id);
            $alumno->nameFullAlumno         = $request->nameFullAlumno;
            $alumno->cedula_alumno          = $request->cedula_alumno;
            $alumno->lugar_exp_document     = $request->lugar_exp_document;
            $alumno->ref_family             = $request->ref_family;
            $alumno->phone_ref_family       = $request->phone_ref_family;
            $alumno->talla_uniforme         = $request->talla_uniforme;
            $alumno->email_alumno           = $request->email_alumno;
            $alumno->ciudad                 = $request->ciudad;
            $alumno->phone_alumno           = $request->phone_alumno;
            $alumno->edad_alumno            = $request->edad_alumno;
            $alumno->addres                 = $request->addres;
            $alumno->observ                 = $request->observ;
            $alumno->curso_id               = $request->curso_id;
            $alumno->profesor_id            = $request->profesor_id;
            $alumno->save(); 
        } 

            $updateAlumno ="Alumno actualizado Correctamente";
        return redirect('alumno/')->with(['updateAlumno' => $updateAlumno]);
    }



    public function destroy(Request $request, $id){
        $alumno = Alumnos::findOrFail($id);
        $alumno->delete();
        return redirect('/alumno')->with('mensaje', 'El alumno fue borrado correctamente.');
    }


    public function exportAlumnos()
    {
        $alumnos = Alumnos::all();
        return view('exports.exportAlumnos', compact('alumnos'));     
    }
    


}
