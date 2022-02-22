<!-- partial -->
<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Inicio</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('curso.create') }}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Registrar Curso</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profe.create') }}">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Registrar Profesor</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
        <span class="menu-title">Sección de Alumnos</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('alumno.create') }}">Registrar nuevo Alumno</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('alumno.index') }}">Lista de Alumnos</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Sección de Pagos</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('pago.create') }}">Registrar nuevo Pago</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('pago.index') }}">Lista de Pagos</a></li>
        </ul>
      </div>
    </li>

  </ul>
</nav>
