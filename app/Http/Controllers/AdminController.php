<?php

namespace PSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PSystem\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class AdminController extends Controller {
    public function login() {
        return view('options.login');
    }

    public function auth(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (auth()->user()->access) {
                return view('options.index');
            } else {
                return redirect()->back()->with('danger', 'Email or password incorrect');
            }
        } else {
            return redirect()->back()->with('danger', 'Email or password incorrect');
        }
    }

    public function logout() {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }

    public function logAccess() {
        if (auth()->user()->access and auth()->check()) {
            $sql = DB::table('log')->orderBy('id')->paginate(25);

            return view('options.log', compact('sql'));
        } else {
            Session::flush();

            Auth::logout();

            return redirect('/');
        }
    }
}
