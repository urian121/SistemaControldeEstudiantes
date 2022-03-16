@extends('layouts.app')

@section('content')

@include('mensajes')


<div class="row justify-content-center">
    @if ($update !=0)
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">ACTUALIZAR DATOS DEL PROFESOR <hr></h2>
            <form class="forms-sample" method="post" action="{{ route('profe.update', $profe->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Nombre Y Apellido</label>
                        <input type="text" name="nameFull" class="form-control" value="{{ $profe->nameFull }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Cédula</label>
                        <input type="number" name="cedula" class="form-control" value="{{ $profe->cedula }}" required>
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Teléfono</label>
                        <input type="number" name="phone" class="form-control" value="{{ $profe->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ $profe->email }}">
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Profesión</label>
                        <input type="text" name="profesion" class="form-control" value="{{ $profe->profesion }}">
                    </div>
                    <div class="col-md-6">
                        <label  for="exampleInputUsername1">Asignar Curso</label>
                        <select name="curso_id" class="form-control form-control-sm">
                            <option value="">Seleccione</option>
                            @foreach ($cursos as $curso)

                                @if ($curso->id ==$profeidCurso)
                                <option value="{{ $curso->id }}" selected>{{ $curso->nombre_curso }}</option>
                                @else
                                    <option value="{{ $curso->id }}">{{ $curso->nombre_curso }}</option>  
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="row  mb-5">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1" style="text-align: center;">Foto actual</label>
                        <br>
                        @if ($profe->foto_profesor !=NULL)
                            <img src="/fotosProfes/{{ $profe->foto_profesor }}" alt="foto profe" style="max-width: 100px; margin: 0 auto;">
                        @else
                            <img class="card-img-top" src="{{ asset('images/users.png') }}" alt="Foto-Profe" class="imgs" style="width:100px; margin: 0 auto;">
                        @endif
                        
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Cambiar Foto del Profesor</label>
                        <input type="file" name="foto_profesor" class="form-control">
                    </div>
                </div>
    
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary mr-2 mb-3">Actualizar Datos</button>
                    <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    @else
    <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO PROFESOR <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('profe.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nombre Y Apellido</label>
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
                <label class="col-sm-12 col-form-label">Asignar Curso</label>
                <select name="curso_id" class="form-control form-control-sm">
                    <option value="">Seleccione</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}"> {{ $curso->nombre_curso }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">Foto del Profesor</label>
                <input type="file" name="foto_profesor" class="form-control">
            </div>

            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2 mb-3">Registrar</button>
                <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
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
                <td style="float: right">
                    <form action="{{ route('profe.destroy', $profe->id) }}" method="POST">
                        <a class="btn btn-inverse-primary" href="{{ route('profe.show',$profe->id) }}"  style="padding: 8px 15px !important;" title="Ver Detalles">
                            <i class="mdi mdi-account-card-details"></i> Ver
                        </a>
                        <a class="btn btn-inverse-success" href="{{ route('profe.edit',$profe->id) }}"  style="padding: 8px 5px !important;" title="Actualizar Registro">
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
            {!! $profes->links() !!}
        </div>
           
        </div>
    </div>
</div>
</div>

@else
<p> No se ha creado ningún Profesor </p>
@endif  <!----->

@endif <!--FIN DEL UPDATE--->



</div>
@endsection