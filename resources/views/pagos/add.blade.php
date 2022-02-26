@extends('layouts.app')

@section('content')
        

<div class="row justify-content-center">
    <div id="resp"> ----------------</div>
    <br>
    <br>
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">REGISTRAR NUEVO PAGO <hr></h2>
            <form class="forms-sample" method="post" action="{{ route('pagoSave') }}" enctype="multipart/form-data">
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
                        <input type="text" name="curso_id" id="curso_id" class="form-control" readonly>
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Valor del Curso</label>
                        <input type="text" name="valor_curso" id="valor_curso" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Saldo Pendiente</label>
                        <input type="number" name="saldoPendiente" id="saldoPendiente" class="form-control" readonly>
                    </div>
                </div>

                <div id="respuesta">
                    @if (isset($CursoPrecio))

                            @if ($CursoPrecio == $saldoPendiente)
                                <h2>El alumno ya pago</h2>
                            @else
                            <h2>Alumno con deuda</h2>
                            @endif
                    @else
                        
                    @endif
                </div>

                <div class="row  mb-5">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Aporte</label>
                        <input type="number" name="aporte" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Foto del Pago</label>
                        <input type="file" name="photo_pago" class="form-control" >
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


@endsection

@section('script')
    <script type="text/javascript">
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        /**Reseteando el select***/
        var $miSelect = $('#alumno_id');
        $miSelect.val($miSelect.children('option:first').val());


    $('select#alumno_id').on('change',function(){
        var alumno_id = $(this).val();
        var dataString   = 'alumno_id=' + alumno_id;
       
        $.ajax({
            type:'POST',
            //dataType: 'json',
            url:"{{ route('pago.store') }}",
            data:{ "alumno_id" : alumno_id },
            success:function(data){
               // $('#resp').html(JSON.stringify(data.infoAlumno));
                var alumnoCursoId = (JSON.stringify(data.infoAlumno[0].curso_id));
                var CursoPrecio = (JSON.stringify(data.infoCurso[0].precio_curso));
                var PagosAlumno = ((data.infoPagosCurso));
             
                //Validando si existe algun pago que ha realizado el Alumno para este curso
                if(!PagosAlumno.length) { //No ha realizado ningun pago para ste curso
                    $('#saldoPendiente').val(CursoPrecio); 
                    //$('#resp').html(PagosAlumnoAporte);
                }else{ //Si ha realizado al menos un pago para este curso
                    var PagosAlumnoAporte = (JSON.stringify(data.infoPagosCurso[0].aporte));
                    var saldoPendiente    = (CursoPrecio - PagosAlumnoAporte);
                    $('#saldoPendiente').val(saldoPendiente); 
                    $('#respuesta').html(CursoPrecio + saldoPendiente);
                    
                }
            
                $('#curso_id').val(alumnoCursoId); 
                $('#valor_curso').val(CursoPrecio); 
                //$('#respuesta').html(CursoPrecio);

                //console.log(JSON.stringify(data.infoAlumno));
                //console.log(JSON.stringify(data.infoCurso));

            }
        });
    });



</script>
@endsection