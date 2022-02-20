@extends('layouts.app')

@section('content')
        
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO ALUMNO <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('alumno.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label class="col-sm-6 col-form-label">Nombre y Apellido</label>
                    <div class="col-sm-12">
                      <input type="text" name="nameFullAlumno" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="col-sm-6 col-form-label">Correo</label>
                    <div class="col-sm-12">
                      <input type="email" name="email_alumno" class="form-control" />
                    </div>
                </div>
              </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Ciudad</label>
                    <div class="col-sm-12">
                      <input type="text" name="ciudad" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Teléfono</label>
                    <div class="col-sm-12">
                      <input type="number" name="phone_alumno" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Edad del Alumno</label>
                    <select name="edad_alumno" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                        @for ($a=10; $a <=50; $a++) 
                            <option value="<?php echo $a; ?>"> <?php echo ($a); ?></option>
                        @endfor 
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Dirección</label>
                    <div class="col-sm-12">
                      <input type="text" name="addres" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Asignar Curso</label>
                    <select name="curso_id" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                        @for ($a=1; $a <=10; $a++) 
                            <option value="<?php echo $a; ?>"> <?php echo ($a); ?></option>
                        @endfor 
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Asignar Profesor</label>
                    <select name="profesor_id" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                        @for ($a=1; $a <=10; $a++) 
                            <option value="<?php echo $a; ?>"> <?php echo ($a); ?></option>
                        @endfor 
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Foto del Alumno</label>
                    <div class="col-sm-9">
                      <input type="file" name="foto_estudiante" class="form-control" />
                    </div>
                </div>
            </div>
             
          
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2">Registrar Alumno</button>
                <button class="btn btn-inverse-dark btn-fw">Cancelar</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
