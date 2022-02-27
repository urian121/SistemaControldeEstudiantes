@extends('layouts.app')

@section('content')
        



@if($pagos->count())
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE PAGOS 
        <a class="btn btn-inverse-primary" href="{{ route('exportPagos') }}"  style="padding: 8px 15px !important;" title="Ver Detalles"> Descargar</a>
    </h4>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Nombre del Alumno</th>
            <th>Curso</th>
            <th>Valor del Curso</th>
            <th>Aporte</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
            <tr>
                <td>{{ $pago->alumno->nameFullAlumno }}</td>
                <td>{{ $pago->curso->nombre_curso }}</td>
                <td>{{ $pago->valor_curso }}</td>
                <td>{{ $pago->aporte }}</td>
                <td style="float: right">
                    <form action="{{ route('alumno.destroy',$pago->id) }}" method="POST">
                        <a class="btn btn-inverse-primary" href="{{ route('alumno.show',$pago->id) }}"  style="padding: 8px 15px !important;" title="Ver Detalles">
                            <i class="mdi mdi-account-card-details"></i> Ver
                        </a>
                        <a class="btn btn-inverse-success" href="{{ route('alumno.edit',$pago->id) }}"  style="padding: 8px 5px !important;" title="Actualizar Registro">
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
            {!! $pagos->links() !!}

        </div>
    </div>
</div>
</div>
@else
<p> No se han creado Alumnos </p>
@endif

@endsection
