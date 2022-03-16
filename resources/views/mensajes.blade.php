<!-- mensajesmodulo Alumnos -->
@if ( session('updateAlumno') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('updateAlumno') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif

@if ( session('mensajeRegistro') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('mensajeRegistro') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif

@if ( session('mensajeBorrar') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('mensajeBorrar') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif

<!-- fin de los mensajes del modulo de alumnos -->

<!--- mensajes del modulo Curso -->
@if ( session('msjRegist') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('msjRegist') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif

@if ( session('msjDelete') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('msjDelete') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif

<!--- fin msjs de los cursos --->

<!---- mensajes del modulo de profesores -->
@if ( session('RegisterProfe') )
<div class="row re" id="proBanner">
    <div class="col-md-12 grid-margin">
      <div class="card bg-gradient-primary border-0">
        <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
          <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
            <strong>Felicitaciones !</strong>
            {{ session('RegisterProfe') }}
          </p>
          
          <div class="d-flex">
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
@endif     