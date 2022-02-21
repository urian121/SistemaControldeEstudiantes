
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