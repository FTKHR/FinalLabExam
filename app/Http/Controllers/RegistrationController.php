<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\RegisterValidate;

class RegistrationController extends Controller
{
    function index(){
    	return view('registration.index');
    }
    function Register(RegisterValidate $request){
    	$Employee= new Employee;
    	$Employee->name=$request->name;
    	$Employee->companyName=$request->companyName;
    	$Employee->contactNumber=$request->contactNumber;
    	$Employee->username=$request->username;
    	$Employee->password=$request->password;
    	$Employee->save();
    	return redirect('/home');
    }
}
