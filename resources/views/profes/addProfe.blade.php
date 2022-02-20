@extends('layouts.app')

@section('content')
        



<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO PROFESOR <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('profe.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputUsername1">Nombre Y Apellido</label>
                <input type="text" name="nameFull" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Cédula</label>
                <input type="number" name="cedula" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Teléfono</label>
                <input type="number" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Correo</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Profesión</label>
                <input type="text" name="profesion" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Curso</label>
                <input type="text" name="curso_id" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="exampleInputUsername1">Foto del Profesor</label>
                <input type="file" name="foto_profesor" class="form-control">
            </div>

            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <button class="btn btn-inverse-dark btn-fw">Cancelar</button>
            </div>
        </form>
        </div>
    </div>
</div>

@if($profes->count())
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE PROFESORES  <strong>( {{ $profes->count() }} )</strong></h4>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Profesor</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profes as $profe)
            <tr>
                <td>{{ $profe->nameFull }}</td>
                <td>{{ $profe->cedula }}</td>
                <td>{{ $profe->phone }}</td>
                <td>
                    <a href=""  class="btn btn-inverse-primary btn-fw" style="padding: 8px 15px !important;">
                        <i class="mdi mdi-delete-sweep"></i> Modificar
                    </a>
     
                    <form method="POST" action="{{ route('profe.destroy', $profe->id) }}">
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
            {!! $profes->links() !!}

        </div>
    </div>
</div>
</div>
@else
<p> No se ha creado ningún Curso </p>
@endif


@endsection