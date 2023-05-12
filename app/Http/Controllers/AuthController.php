<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Signin(){
        return view('pages.Signin');
    }
    public function Login(){
        return view('pages.login');
    }
    public function cekLogin(Request $request)
    {   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'proses login gagal');
        return redirect('/login');
    }
    public function userRegister(Request $request){
        $request->validate([
            'password' => 'confirmed'
        ]);
        $roleId = 0;
        if ($request->input('role') == 'Pengimpor') {
            $roleId = 2;
        } else {
            $roleId = 3;
        }

        $RegisterUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'id_role' => $roleId,
            'password' => Hash::make($request->password)
        ]);
        if($RegisterUser){
            return redirect('/login');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'proses registrasi gagal');
        return redirect('/signin');
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
