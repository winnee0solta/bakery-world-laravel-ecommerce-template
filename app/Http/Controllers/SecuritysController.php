<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Response;

class SecuritysController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    public function view()
    {

        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('login');
    }
    //login user
    public function index(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt([
            'username' => request('username'),
            'password' => request('password')
        ]);

        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }
    }
    //register user
    public function register($username, $password)
    {
        $user = User::create([
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        $data = array('message' => 'user created', 'data' => $user);
        return Response($data, 202);
    }

    //logout
    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }
}
