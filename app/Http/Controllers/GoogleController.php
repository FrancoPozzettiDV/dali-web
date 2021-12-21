<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GoogleController extends Controller
{
    public function googleLogin(){
        
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        
        $user = Socialite::driver('google')->user();
        
        $userExists = User::where('id_externo', $user->id)->where('auth_externo','google')->first();
        
        $userMail = User::where('email',$user->email)->first(); 

        if(!$userExists):
            
            if(!$userMail):

                $newUser = new User;

                $newUser->nombre = $user->user["given_name"];
                $newUser->apellido = $user->user["family_name"];
                $newUser->email = $user->email;
                $newUser->usuario = $user->user["given_name"];
                $newUser->password = Hash::make($user->name.'@'.$user->id);
                $newUser->id_externo = $user->id;
                $newUser->auth_externo = "google";

                $newUser->save();

                Auth::login($newUser);
                
            else:
                
                return redirect()->route("web.login")->with('failure', 'El mail del usuario que intenta ingresar mediante google ya se encuentra registrado en el sistema.');
            
            endif;
        
        else:
           
            Auth::login($userExists);

        endif;
        
        return redirect()->route("web.index");
        
    }

}
