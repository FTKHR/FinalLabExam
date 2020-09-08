<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

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
    public function verify(Request $request){

        $data = Employee::where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();
        if (count($data) > 0) {
            $request->session()->put('username', $request->username);
            if($data[0]->type == "member"){
                $request->session()->put('type', "member");
                return redirect('/home');
            }
            else if($data[0]->type == "admin"){
                $request->session()->put('type', "admin");
                return redirect('/admin');
            }
        } else {
            
        }
        
    }
}
