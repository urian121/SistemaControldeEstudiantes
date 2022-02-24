@extends('layouts.app')

@section('content')
        



@if($alumnos->count())
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE ALUMNOS  <strong>( {{ $alumnosTotal->count() }} )</strong></h4>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Nombre del Alumno</th>
            <th>Cédula</th>
            <th>Email</th>
            <th>Ciudad</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nameFullAlumno }}</td>
                <td>{{ $alumno->cedula_alumno }}</td>
                <td>{{ $alumno->email_alumno  }}</td>
                <td>{{ $alumno->ciudad }}</td>
                <td style="float: right">
                    <form action="{{ route('alumno.destroy',$alumno->id) }}" method="POST">
                        <a class="btn btn-inverse-primary" href="{{ route('alumno.show',$alumno->id) }}"  style="padding: 8px 15px !important;" title="Ver Detalles">
                            <i class="mdi mdi-account-card-details"></i> Ver
                        </a>
                        <a class="btn btn-inverse-success" href="{{ route('alumno.edit',$alumno->id) }}"  style="padding: 8px 5px !important;" title="Actualizar Registro">
                            <i class="mdi mdi-autorenew"></i>Actualizar
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-inverse-danger"  style="padding:  8px 5px !important;" title="Borrar Alumno">
                            <i class="mdi mdi-delete-sweep"></i>Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

            <br><br>
            {!! $alumnos->links() !!}

        </div>
    </div>
</div>
</div>
@else
<p> No se han creado Alumnos </p>
@endif

@endsection
