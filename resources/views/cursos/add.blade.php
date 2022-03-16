@extends('layouts.app')

@section('content')
        
@include('mensajes')


<div class="row justify-content-center">
@if(($update !=0))

<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">ACTUALIZAR DATOS DEL CURSO <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('curso.update', $curso->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleInputUsername1">Nombre del Curso</label>
                <input type="text" name="nombre_curso" class="form-control" value="{{ $curso->nombre_curso }}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Valor del Curso</label>
                <input type="number" name="precio_curso" class="form-control" value="{{ $curso->precio_curso }}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Fecha creación del Curso</label>
                <input type="date" name="dateCurso" class="form-control" value="{{ $curso->dateCurso }}" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2 mb-3">Actualizar Curso</button>
                <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
            </div>

            <div class="form-group text-center">
                <a href="/curso/create" class="btn btn-primary">
                    <i class="mdi mdi-undo-variant"></i> Volver
                </a>
            </div>

        </form>
        </div>
    </div>
</div>


@else
<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO CURSO <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('curso.store') }}">
            @csrf

            <div class="form-group">
                <label for="exampleInputUsername1">Nombre del Curso</label>
                <input type="text" name="nombre_curso" class="form-control" required>
                @if ($errors->has('nombre_curso'))
                <div class="alert alert-danger">
                    <span class="text-danger">{{ $errors->first('nombre_curso') }}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Valor del Curso</label>
                <input type="number" name="precio_curso" class="form-control" required>
                @if ($errors->has('precio_curso'))
                <div class="alert alert-danger">
                    <span class="text-danger">{{ $errors->first('precio_curso') }}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Fecha creación del Curso</label>
                <input type="date" name="dateCurso" class="form-control" required>
                @if ($errors->has('dateCurso'))
                <div class="alert alert-danger">
                    <span class="text-danger">{{ $errors->first('dateCurso') }}</span>
                </div>
                @endif
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2 mb-3">Registrar</button>
                <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
            </div>
        </form>
        </div>
    </div>
</div> 


@if($cursosTable->count())
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
    <h4 class="card-title text-center">LISTA DE CURSOS  <strong>( {{ $cursosTotal->count() }} )</strong></h4>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Curso</th>
            <th>Valor</th>
            <th>Fecha</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursosTable as $cur)
            <tr>
                <td>{{ $cur->nombre_curso }}</td>
                <td>{{ $cur->precio_curso }}</td>
                <td>
                     {{ date('d-m-Y', strtotime($cur->dateCurso))  }}
                    </td>
                <td style="float: right">
                    <form action="{{ route('curso.destroy',$cur->id) }}" method="POST">
                        <a class="btn btn-inverse-success" href="{{ route('curso.edit',$cur->id) }}"  style="padding: 8px 5px !important;" title="Actualizar Registro">
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
        <div class="form-group text-center mt5">
            {!! $cursosTable->links() !!}
        </div>

        </div>
    </div>
</div>
</div>

@else
<p> No se ha creado ningún Curso </p>
@endif

@endif <!---fin del primer if else -->

</div>


@endsection

@section('script')
<script>
$(function () {
    console.log('tabla');
  });
</script>
@stop