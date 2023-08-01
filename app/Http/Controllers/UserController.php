<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function storeLogin(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return redirect()->back()->with('error', "Email atau password salah");
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        $price = mt_rand(100000, 125000);
        $works = Work::all();
        return view('register', ['price' => $price, 'works' => $works]);
    }

    public function payment(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3',
            'fields_of_interest' => 'required|array|min:3',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'phoneNumber' => 'required|regex:/^[0-9]{8,14}$/',
            'image' => 'required|image',
            'password' => 'required|string|min:4',
            'passwordConfirmation' => 'required|string',
        ]);

        $validated['image']  = $request->file('image')->store('profile');

    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'work' => 'required',
            'phoneNumber' => 'required|regex:/^[0-9]{8,14}$/',
            'image' => 'required',
            'password' => 'required|string|min:4',
            'passwordConfirmation' => 'required|string',
        ]);

        // $validated['image']  = $request->file('image')->store('profile');

        $user = User::create([
            'name' => $validated['name'],
            'linked_in' => $validated['username'],
            'email' => $validated['email'],
            'birthdate' => $validated['birthdate'],
            'gender' => $validated['gender'],
            'phoneNumber' => "+62" . $validated['phoneNumber'],
            'imagePath' => $validated['image'],
            'password' => bcrypt($validated['password']),
            'wallet' => $validated['wallet']
        ]);

        return redirect("/login")->with('success', 'Selamat akun anda berhasil dibuat, anda sudah dapat login');
    }

    public function createLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function topup(Request $request){
        $user = User::find(auth()->user()->id);

        $user->wallet = $user->wallet + $request->wallet;
        $user->update();

        return redirect('/home');
    }
}
