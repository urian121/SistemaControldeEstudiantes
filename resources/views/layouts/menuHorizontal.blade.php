<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center" style="background-color: #FF9900 !important;border-right: 1px solid #FF9900;">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
      <!--<a class="navbar-brand brand-logo" href="/">
        <img src="{{ asset('images/logo.svg') }}" alt="logo"/>
      </a> -->
      <strong style="font-weight: 800; font-size:28px; text-center; margin:0 auto;"> SGE</strong>
      
      <!--<a class="navbar-brand brand-logo-mini" href="/">
        <img src="{{ asset('images/logo-mini.svg') }}" alt="logo"/>
      </a>-->
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>  
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #FF9900 !important">
    
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="{{ asset('images/faces/face5.jpg') }}" alt="profile"/>
          @if (Auth::check())
          <span class="nav-profile-name"> {{ Auth::user()->name }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a href="{{ route('NewPassword') }}" class="dropdown-item">
            <i class="mdi mdi-settings text-primary"></i>
            Mi Perfil
          </a>

          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power text-primary"></i>
            Salir
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
           @csrf
          </form>

        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>