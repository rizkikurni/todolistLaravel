<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // public function index()
    // {
    //     return view('register.index', [
    //         'title' => 'Regiater',
    //         'active' => 'register'
    //     ]);
    // }

    public function index()
    {
        return view('register.index');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validation['password'] = Hash::make($validation['password']);

        User::create($validation);

        return redirect('/login')->with('sukses', 'Registrasi berhasil! silahkan login');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255', //bisa ditulis seperti ini atau seperti dibawah
    //         'username' => ['required', 'min:3', 'max:255', 'unique:users'],
    //         'email' => 'required|email:dns|unique:users',
    //         'password' => 'required|min:5|max:255'
    //     ]);

    //     // $validatedData['password'] = bcrypt($validatedData['password']);
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     // $request->session()->flash('success', 'Registrasi berhasil! silahkan login');

    //     return redirect('/login')->with('success', 'Registrasi berhasil! silahkan login');
    // }
}
