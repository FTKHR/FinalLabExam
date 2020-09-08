<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class RegistrationController extends Controller
{
    function index(){
    	return view('registration.index');
    }
    function Register(RegisterValidate $request){
    	
    }
}
