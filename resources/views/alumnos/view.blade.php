@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="text-center mb-3">
                DETALLES DEL ALUMNO<hr>
            </h2>

        <div class="row">
            <div class="col-md-12">
            <div class="card" style="width: 30rem;">
                @if ( $alumno->foto_estudiante !=NULL )
                <img class="card-img-top" src="/fotosAlumnos/{{ $alumno->foto_estudiante }}" alt="Foto-Alumno" class="imgs" style="width:200px; margin: 0 auto;">
                @else
                <img class="card-img-top" src="{{ asset('images/users.png') }}" alt="Foto-Alumno" class="imgs" style="width:200px; margin: 0 auto;">   
                @endif

                
                <div class="card-body">
                <h6 class="card-title"><strong>Nombre y Apellido:</strong>
                     {{ $alumno->nameFullAlumno }} <hr>
                </h6>
                <h5 class="card-title"><strong>Edad:</strong> 
                    {{ $alumno->edad_alumno }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Correo:</strong> 
                    {{ $alumno->email_alumno }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Ciudad:</strong> 
                    {{ $alumno->ciudad }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Teléfono:</strong> 
                    {{ $alumno->phone_alumno }} 
                    <hr>
                </h5>
                
                <h5 class="card-title"><strong>Dirrección:</strong> 
                    {{ $alumno->addres }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Curso:</strong> 
                    {{ $alumno->curso->nombre_curso  }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Profesor:</strong> 
                    {{ $alumno->profesor->nameFull }} 
                    <hr>
                </h5>
                <a href="/alumno" class="btn btn-primary">
                    <i class="mdi mdi-undo-variant"></i> Volver
                </a>
                </div>
            </div>
            </div>
        </div>


            </div>
        </div>
    </div>
</div>

@endsection
