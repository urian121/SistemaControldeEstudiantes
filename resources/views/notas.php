
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













<?php
                    if($request->ajax()){
           // $countries = DB::table('countries')->get();
           // return view('users',compact('countries'));

            $data = Alumnos::select("id")
            ->where("id","LIKE","%{$request->query}%")
            ->get();
            return response()->json($data);


             $countries = \DB::table('countries')
            ->get();
        
        return view('dropdown', compact('countries'));


          $states = \DB::table('states')
            ->where('country_id', $request->country_id)
            ->get();

            
           /* $countries = DB::table('countries')
            ->get();
        return view('dropdown', compact('countries'));

        $categoris = Category::where('parent_id',0)->get();
        return view('welcome',["categoris" => $categoris]);*/

        /*
        $states = DB::table('states')->whereCountryId($request->country_id)->get();
        return response()->json($states);
        */
        /*
        $cities = DB::table('cities')->whereStateId($request->state_id)->get();
        return response()->json($cities);
        */
            /*
               $states = DB::table("teachers")
                ->where("nation_id",$id)
                ->pluck("teacher_name","teacher_id");
                return response()->json($teachers);  
            */
          /*  $states = DB::table('states')->where('id_country',$request->id_country)->pluck("name","id")->all();
    		$data = view('ajax-select',compact('states'))->render();
    		return response()->json(['options'=>$data]);*/

            //$alumno = Alumnos::findOrFail($id);
           // return view('pagos.add', compact('alumno'));
            dd($request->all());
            /*return response()->json([
                'mensaje'=> '<p>' .$request->all().'</p>'
            ]);  */
        }

        $affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);

              return redirect()->back()->with('message', 'Task added successfuly');


              $users = DB::select('select * from users where active = ?', [1]);

        return view('user.index', ['users' => $users]);

        $affected = DB::update('update users set votes = 100 where name = ?', ['John']);


        $last = DB::table('items')->latest()->first();
        $last2 = DB::table('items')->orderBy('id', 'DESC')->first();
        $last3 = DB::table('items')->latest('id')->first();