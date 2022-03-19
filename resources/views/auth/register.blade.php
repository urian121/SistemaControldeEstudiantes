@extends('layouts.app_login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="width:80px;">
              </div>
              <h4 class="text-center">Crear cuenta de Usuario</h4>
              
              <form method="POST" action="{{ route('register') }}" class="pt-3">
                @csrf
                
                <div class="form-group">
                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" placeholder="Nombre y Apellido" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           
                <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Clave" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Repetir Clave" required autocomplete="new-password">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('Registrar Usuario') }}
                    </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                   <a href="/login" class="text-primary">Volver</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
