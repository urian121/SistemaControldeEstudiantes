@extends('layouts.app')

@section('content')
        



@if($alumnos->count())
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE PROFESORES  <strong>( {{ $alumnos->count() }} )</strong></h4>
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
                <td>--</td>
                <td>{{ $alumno->email  }}</td>
                <td>{{ $alumno->ciudad }}</td>
                <td>
                    <a href=""  class="btn btn-inverse-primary btn-fw" style="padding: 8px 15px !important;">
                        <i class="mdi mdi-delete-sweep"></i> Modificar
                    </a>
     
                    <form method="POST" action="{{ route('alumno.destroy', $alumno->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit"  class="btn btn-inverse-danger btn-fw" style="padding: 8px 15px !important;">
                            <i class="mdi mdi-delete-sweep"></i> Borrar
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
