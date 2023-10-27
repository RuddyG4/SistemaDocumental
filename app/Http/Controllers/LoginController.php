<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!Auth::validate($credentials)) {
            return redirect('login')->withErrors(['failedAuth' =>'El correo y/o contraseña son incorrectos, verifique e intente nuevamente']);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials); // Recupera la instancia User perteneciente a $credentials.
        Auth::login($user);
        return redirect()->intended('dashboard');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->to('/login');
    }

    public function registerView()
    {
        return view('register');
    }
    public function register(Request $request){
        $credentials = $request->validate([
            'nombre'   => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required']
        ]);
        User::create([
            'role_id' => 1,
            'username' => $credentials['nombre'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'tenan_id' => 1
        ]);
        return redirect()->to('/login')->with('success', 'ok');
    }
    public function resetPasswordView(){
        return view('reset-password');
    }
    public function resetPassword(Request $request){
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
            'confirm_password' => ['required']
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if (isset($user)) {
            if ($credentials['password'] == $credentials['confirm_password']) {
                $user->password = bcrypt($credentials['password']);
                $user->save();
                return redirect()->to('/login')->with('success', 'si');
            }else{
                return redirect()->to('/reset-password-view')->withErrors(['failedAuth' =>'Las contraseñas no coinciden']);
            }
        }else{
            return redirect()->to('/reset-password-view')->withErrors(['failedAuth' =>'El correo no existe']);
        }
    }
}
