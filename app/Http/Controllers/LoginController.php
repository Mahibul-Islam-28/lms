<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }
    function logData(Request $request)
    {
        $userName = $request->userName;
        $password = $request->password;
        $operator = Operator::where('user_name', '=', $userName)
                        ->where('password', '=', $password)
                        ->first();
        if($operator)
        {
            $request->session()->put('operator', $operator);

            return redirect(route('index'))
            ->with('success','You have successfully logged in');
        }
        else{
            return back()->with('error', 'User Name and Password Not Matched.');
        }
    }
    // signOut
    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('login'));
    }

    // index
    function index()
    {
        return view('index');
    }
    function notFound()
    {
        return view('errors.404');
    }
}
