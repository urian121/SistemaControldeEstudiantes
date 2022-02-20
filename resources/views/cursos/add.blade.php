@extends('layouts.app')

@section('content')
        



<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO CURSO <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('curso.store') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputUsername1">Nombre del Curso</label>
                <input type="text" name="nombre_curso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Valor del Curso</label>
                <input type="number" name="precio_curso" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <button class="btn btn-inverse-dark btn-fw">Cancelar</button>
            </div>
        </form>
        </div>
    </div>
</div>

@if($cursos->count())
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE CURSOS  <strong>( {{ $cursos->count() }} )</strong></h4>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Curso</th>
            <th>Valor</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre_curso }}</td>
                <td>{{ $curso->precio_curso }}</td>
                <td>
                    <a href=""  class="btn btn-inverse-primary btn-fw" style="padding: 8px 15px !important;">
                        <i class="mdi mdi-delete-sweep"></i> Modificar
                    </a>

                    <form action="{{ route('curso.destroy',$curso->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="mdi mdi-delete-sweep"></i> Borrar
                        </button>
                    </form>

                    
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

            <br><br>
            {!! $cursos->links() !!}

        </div>
    </div>
</div>
</div>
@else
<p> No se ha creado ningún Curso </p>
@endif


@endsection
