@extends('layouts.app')

@section('content')
        

<div class="row justify-content-center">

    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">REGISTRAR NUEVO PAGO <hr></h2>
            <form id="form" name="form" class="forms-sample" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  for="exampleInputUsername1">Datos del Alumno <em>(Nombre y Cédula)</em></label>
                        <select name="alumno_id" id="alumno_id" class="form-control form-control-sm">
                            <option value="">Seleccione</option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}"> {{ $alumno->nameFullAlumno }} :: {{ $alumno->phone_alumno }}</option>
                            @endforeach
                        </select>
                    </div>

                     <div class="col-md-6">
                        <label for="exampleInputUsername1">Curso del Alumno</label>
                        <input type="text" name="curso_id" class="form-control" readonly>
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Valor del Curso</label>
                        <input type="number" name="valor_curso" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Aporte</label>
                        <input type="number" name="aporte" class="form-control" readonly required>
                    </div>
                </div>

                <div class="row  mb-5">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Saldo Pendiente</label>
                        <input type="number" name="saldoPendiente" class="form-control readonly" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Foto del Pago</label>
                        <input type="file" name="photo_pago" class="form-control" disabled>
                    </div>
                </div>
    
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary mr-2 mb-3">Registrar Pago</button>
                    <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>

<div id="resp"> ---</div>

@endsection

@section('script')
    <script type="text/javascript">
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

    $('select#alumno_id').on('change',function(){
        var alumno_id = $(this).val();
        console.log(alumno_id);
        var dataString   = 'alumno_id=' + alumno_id;

        $.ajax({
            type:'POST',
            url:"{{ route('pago.store') }}",
            dataType: 'json',
            data:{ "alumno_id" : alumno_id },
            contentType: false,
            processData: false,
            success:function(data){
                $('#resp').html(data.mensaje);    
            }
        });


    });

    </script>
@endsection