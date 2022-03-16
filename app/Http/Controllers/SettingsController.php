<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{


    public function NewPassword(){
        return view('settings');
    }

    public function changePassword(Request $request){    
        
        $user           = Auth::user();
        $userId         = $user->id;
        $userEmail      = $user->email;
        $userPassword   = $user->password;



        $PassActual = $request->current_password;
        $NuewPass   = $request->password;
        $confirPass = $request->confirm_password;
        
        //Verifico si la clave actual es igual a la clave del usuario en session
        if (Hash::check($request->current_password, $userPassword)) {

            //Valido que tanto la 1 como 2 clave sean iguales
            if($NuewPass == $confirPass){
                //Valido que la clave no sea Menor a 6 digitos
                if(strlen($NuewPass) >= 6){
                    $user->password = Hash::make($request->password);
                    $sqlBD = DB::table('users')
                          ->where('id', $user->id)
                          ->update(['password' => $user->password]);
            
                    return redirect()->back()->with('updateClave','La clave fue cambiada correctamente.');
                }else{
                    return redirect()->back()->with('clavemenor','Recuerde la clave debe ser mayor a 6 digitos.');
                }

        }else{
            return redirect()->back()->with('claveIncorrecta','Por favor verifique las claves no coinciden.');
        }
   
    }else{
        return back()->withErrors(['current_password'=>'La Clave no Coinciden']);
    }
}


}
