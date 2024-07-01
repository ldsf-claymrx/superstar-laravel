<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function getViewLogin(){
        return view('login');
    }

    public function getViewRegister() {
        return view('register');
    }

    public function create(Request $request){

        $UsersRegistered = User::all();

        foreach ($UsersRegistered as $UserRegistered) {
            if($UserRegistered->email == $request->input('email')){
                return redirect()->back()->with('error', 'Este correo ya esta registrado');
            }
        }

        $User = new User;
        $User->name = ucwords(strtolower($request->input('name')));
        $User->lastname = ucwords(strtolower($request->input('lastname')));
        $User->phone_number = $request->input('phone_number');
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        $User->save();

        return redirect('/login')->with('success', '¡Registro exitoso! Ahora inicia sesión');
    }
}
