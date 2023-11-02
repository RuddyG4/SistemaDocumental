<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users\Customers;
use App\Models\Users\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
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
            'nombre'   => ['required', 'max:60'],
            'empresa'   => ['required', 'max:60'],
            'email'    => ['required', 'email', 'max:60', 'unique:users', 'unique:customers'],
            'password' => ['required', 'max:60']
        ]);
        $customer = Customers::create([
            'name' => $credentials['empresa'],
            'email' => $credentials['email'],
            'company_name' => $credentials['empresa'],
            'password' => bcrypt($credentials['password']),
        ]);

        $role = Role::create([
            'role_name' => 'Administrator',
            'description' => 'Administrador con control total del sistema.',
            'tenan_id' => $customer->id
        ]);

       $user = User::create([
            'role_id' => $role->id,
            'username' => $credentials['nombre'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'tenan_id' => $customer->id
        ]);
        event(new Registered($user));
        return redirect()->to('/login')->with('success', 'ok');
    }
    public function resetPasswordView(){
        return view('reset-password');
    }
    public function resetPassword(Request $request){
        $credentials = $request->validate([
            'token' => 'required',
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
