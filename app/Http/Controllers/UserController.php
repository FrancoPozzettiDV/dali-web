<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function usuariosTableView(){
        
        $users= $this->user->allWithPerfil();

        return view('admin.usuarios')->with(["users" => $users]);
    }

    public function usuarioReadView($id){
        $user = $this->user->findWithPerfil($id);

        if(!$user):
            return redirect()->back();
        else:
            return view('admin.usuarioRead')->with(["user" => $user]);
        endif;
    }

    public function usuarioCatEdit(Request $request){

        $id_usuario = $request->id;
        $id_perfil_new = $request->id_perfil;

        $user = $this->user->find($id_usuario);

        $user->id_perfil = $id_perfil_new;
        $user->save();

        return redirect()->route("admin.usuarios")->with('success', '¡Los permisos del usuario <'.$user->usuario.'> se han modificado exitosamente!');
    }

    public function userRegistry(Request $request){

        $validated = $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'telefono' => ['nullable','numeric'],
            'usuario' => ['required'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user = new User;
        
        if(empty($request->telefono)):
            $user->telefono = null;
        else:
            $user->telefono = trim($request->telefono);
        endif;
        $user->nombre = trim($request->nombre);
        $user->apellido = trim($request->apellido);
        $user->email = trim($request->email);
        $user->usuario = trim($request->usuario);
        $user->password = Hash::make(trim($request->password));

        $user->save();
        return redirect()->route("web.login")->with('status', '¡El usuario ha sido creado exitosamente!');
    }

    public function userLogin(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'message' => 'Los datos ingresados son incorrectos',
        ]);
    }

    public function userLogout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userPassMail(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]);
    
    }

    public function userPassReset(Request $request){
        $request->validate([
            'token' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
        
        return $status === Password::PASSWORD_RESET ? redirect()->route('web.login')->with('status', __($status)) : back()->withErrors(['email' => [__($status)]]);
    }
}
