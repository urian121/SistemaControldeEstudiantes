@extends('layouts.app')

@section('content')

@include('mensajes')

<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="text-center mb-3">
                DETALLES DEL PROFESOR<hr>
            </h2>

        <div class="row">
            <div class="col-md-12">
            <div class="card" style="width: 30rem;">
                @if ( $prof->foto_profesor !=NULL )
                <img class="card-img-top" src="/fotosProfes/{{ $prof->foto_profesor }}" alt="Foto-Profe" class="imgs" style="width:200px; margin: 0 auto;">
                @else
                <img class="card-img-top" src="{{ asset('images/users.png') }}" alt="Foto-Profe" class="imgs" style="width:200px; margin: 0 auto;">   
                @endif

                
                <div class="card-body">
                <h6 class="card-title"><strong>Nombre y Apellido:</strong>
                     {{ $prof->nameFull }} <hr>
                </h6>
                <h5 class="card-title"><strong>Cédula:</strong> 
                    {{ $prof->cedula }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Correo:</strong> 
                    {{ $prof->email }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Profesión:</strong> 
                    {{ $prof->profesion }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Teléfono:</strong> 
                    {{ $prof->phone }} 
                    <hr>
                </h5>
                
                <h5 class="card-title"><strong>Profesión:</strong> 
                    {{ $prof->profesion }} 
                    <hr>
                </h5>
                <h5 class="card-title"><strong>Curso asignado:</strong> 
                    {{ $prof->curso->nombre_curso ?? 'Curso fue Borrado'}} 
                    <hr>
                </h5>
                 
                <a href="/profe/create" class="btn btn-primary">
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
