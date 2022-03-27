@extends('layouts.app')

@section('content')

@include('mensajes')

@if($pagos->count())
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title text-center">LISTA DE PAGOS 
            <a class="btn btn-inverse-primary" href="{{ route('exportPagosAlumnos') }}"  style="padding: 8px 15px !important;" title="Ver Detalles"> Descargar</a>
        </h4>
        <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr style="text-align: left;">
                    <th>Nombre del Alumno</th>
                    <th>Curso</th>
                    <th>Valor del Curso</th>
                    <th>Aporte</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                <tr>
                    <td>{{ $pago->alumno->nameFullAlumno ?? 'Alumno Borrado' }}</td>
                    <td>{{ $pago->curso->nombre_curso ?? 'Curso Borrado'}}</td>
                    <td>{{ $pago->valor_curso }}</td>
                    <td>{{ $pago->aporte }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>

            <br><br>
            <div class="form-group text-center mt5">
                {!! $pagos->links() !!}
            </div>

            </div>
        </div>
    </div>
    </div>
@else
<p> No se han creado Alumnos </p>
@endif

@endsection
