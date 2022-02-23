
@guest
    // The user is not authenticated...
@endguest
  
@auth
    // The user is authenticated...
@endauth


Para verificar el usuario autenticado o no en la vista o en cualquier lugar del controlador, podemos usar auth () -> check ()

if(auth()->check())
  // If the user only authenticated


Para obtener datos de usuario autenticados actuales.
$user = auth()->user();

@for ($a=1; $a <=10; $a++) 
                            <option value="<?php echo $a; ?>"> <?php echo ($a); ?></option>
                        @endfor 

                        <ul class="flex">
                        <li>
                        <a href="{{ route('alumno.destroy', $alumno->id) }}" title="Editar Editorial">
                            <i class="material-icons">update</i>
                        </a>
                        </li>
                        <li>
                        <a href="{{ route('alumno.destroy',$alumno->id) }}" title="Ver Detalles">
                            <i class="material-icons">pageview</i>
                        </a>
                        </li>
                        <li>
                        <form action="{{ route('alumno.destroy',$alumno->id) }}" method="POST">
                            {{ method_field('DELETE') }} 
                            {{ csrf_field() }}  
                            <a href="#" class="btn-delete" title="Eliminar Editorial">
                                <i class="material-icons">delete</i>
                            </a>
                        </form>
                        </li>
                    </ul>

                       <!-- Authentication Links -->
                       @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>