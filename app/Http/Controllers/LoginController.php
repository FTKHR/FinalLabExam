<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('login.index');
    }
    function verify(Request $request){

        if($request->username=='admin'&&$request->password=='admin')
        {
            $request->session()->put('username', $request->username);
            return redirect('/home');
        }
        $data = Login::where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();
        if (count($data) > 0) {
            $request->session()->put('username', $request->username);
            return redirect('/home');
        } else {
            
        }
        
    }
}
