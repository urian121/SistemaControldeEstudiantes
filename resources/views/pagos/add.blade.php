@extends('layouts.app')

@section('content')
        
@include('mensajes')

<div class="row justify-content-center">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">REGISTRAR NUEVO PAGO <hr></h2>
            <form id="miForm" class="forms-sample" method="post" action="{{ route('pagoSave') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  for="alumno_id">Datos del Alumno <em>(Nombre y Cédula)</em></label>
                        <p style="background-color: #e9ecef !important;">
                        <select name="alumno_id" id="alumno_id" style="background-color: #e9ecef !important;" class="selectpicker des" data-show-subtext="false" data-live-search="true" style="-webkit-appearance: none;">
                            <option value="0">Seleccione</option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}"> {{ $alumno->nameFullAlumno }} :: {{ $alumno->phone_alumno }}</option>
                            @endforeach
                          </select>
                        </p>
                    </div>

                     <div class="col-md-6">
                        <label for="exampleInputUsername1">Curso del Alumno</label>
                        <div id="IdCurso" style="background: #f9f9f9;padding: 10px; font-weight: 600;">
                            <p></p>
                        </div>
                        <input type="text" name="curso_id" id="curso_id" class="form-control" hidden>
                    </div>
                </div>

                <div class="row  mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Valor del Curso</label>
                        $<input type="text" name="valor_curso" id="valor_curso" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputUsername1">Saldo Pendiente</label>
                        $<input type="number" name="saldoPendiente" id="saldoPendiente" class="form-control" readonly>
                    </div>
                </div>

                <section id="sectionPago">
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
                </section>

                <section id="sinDeudas" style="display: none;">
                <div class="row mt-5 mb-5">
                    <div class="col-md-12 text-center">
                        <h2>El Alumno ya ha cancelado todo el valor del Curso</h2>
                    </div>
                </div>
            </section>


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
        if(alumno_id ==0){
            $("#miForm")[0].reset();
            $("#IdCurso").html('<p></p>');

        }
       
        $.ajax({
            type:'POST',
            url:"{{ route('pago.store') }}",
            data:{ "alumno_id" : alumno_id },
            success:function(data){
               // $('#resp').html(JSON.stringify(data.infoAlumno));
                var alumnoCurso         = (data.infoAlumno);
                var CursoPrecioString   = (JSON.stringify(data.infoCurso[0].precio_curso));
                var CursoPrecio         = (CursoPrecioString.replace(/['"]+/g, '')); //Quitando comillas del mi string
                var PagosAlumno         = (data.infoPagosCurso);
                var idCursoAlumno       =  (data.infoAlumnoIdCurso); 

                $('#IdCurso').html(alumnoCurso); 
                $('#curso_id').val(idCursoAlumno); 
                $('#valor_curso').val(CursoPrecio);
                
                //Validando si existe algun pago que ha realizado el Alumno para este curso
                if(!PagosAlumno.length) { //No ha realizado ningun pago para ste curso
                    $('#saldoPendiente').val(CursoPrecio); 
                    }else{ //Si ha realizado al menos un pago para este curso

                    if(CursoPrecio == PagosAlumno){
                        var saldoPendiente    = (CursoPrecio - PagosAlumno);
                        $('#saldoPendiente').val(saldoPendiente); 
                        $("#sectionPago").hide();
                        $("#sinDeudas").show();
                    }else{
                        var saldoPendiente    = (CursoPrecio - PagosAlumno);
                        $('#saldoPendiente').val(saldoPendiente); 
                        $("#sectionPago").show();
                        $("#sinDeudas").hide();
                    }
                }
            }
        });
    });
</script>
@endsection