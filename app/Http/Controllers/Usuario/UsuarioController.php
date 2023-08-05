<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Funcion para retornar la vista de crear un usuario
    public function vista_crear_usuario()
    {
        return view('usuario.crear_usuario');
    }

    // Funcion para registrar un usuario
    public function crear_usuario(StoreUsuarioRequest $request)
    {
        $informacion = $request->validated();

        $informacion["password"] = Hash::make($request->get('password'));

        User::create($informacion);

        return redirect()->route('vista_login_usuario')->with('cuenta_creada', '¡Felicitaciones! La cuenta se ha creado correctamente. ¡Inicia sesión ahora mismo! ');
    }

    // Funcion vista login del usuario
    public function vista_login_usuario()
    {
        return view('usuario.login_usuario');
    }

    // Funcion para el login
    public function validar_login(Request $request)
    {

        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($credenciales)) {
            $usuario = Auth::user();
            $request->session()->put('usuario', $usuario);
            return redirect()->route('index.pokemones')->with('usuario_logueado', '¡Bienvenido! Has iniciado sesión correctamente.');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
            'password' => 'Contraseña incorrecta',
        ])->onlyInput('email', 'password');
    }

    // Funcion para cerrar la sesion del usuario
    public function cerrar_sesion_usuario()
    {

        Auth::logout();

        session()->forget('usuario');

        return redirect()->route('index.pokemones')->with('cierre_sesion', 'Se cerro la sesión correctamente');
    }

    // Funcion para visializar los detalles de un pokemon
    public function ver_datos_pokemon($id)
    {
        if (Auth::check()) {
            return view('lista_pokemones.datos_pokemon', compact('id'));
        } else {
            return redirect()->route('vista_login_usuario')->with('usuario_no_logueado', 'Lo sentimos no puedes realizar esta acción debes de iniciar sessión primero');
        }
    }
}
