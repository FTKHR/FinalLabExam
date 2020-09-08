<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\RegisterValidate;
class AdminController extends Controller
{	
	public function index(Request $request){
        if($request->session()->has('username')){
	    	if($request->session()->get('type')=="admin"){
	    		$empList = Employee::where('type', 'member')->get();
	    		return view('admin.index')->with('data',$empList);
	    	}
	    	else{
	    		return redirect('/home');
	    	}
	    }
	    else{
	    	return redirect('/login');
	    }
    }
   	function regIndex(){
    	return view('registration.index');
    }
    function register(RegisterValidate $request){

    	 if($request->session()->has('username')){
	    	
	    	if($request->session()->get('type')=="admin"){
		    	
		    	$Employee= new Employee;
		    	$Employee->name=$request->name;
		    	$Employee->companyName=$request->companyName;
		    	$Employee->contactNumber=$request->contactNumber;
		    	$Employee->username=$request->username;
		    	$Employee->password=$request->password;
		    	$Employee->save();
		    	return redirect('/admin');
		    }
		   else{
	    		return redirect('/home');
	    	}
	    }
	    else{
	    	return redirect('/login');
	    }
    }
     function deleteEmp($id, Request $request){

        if($request->session()->has('username')){
	    	if($request->session()->get('type')=="admin"){
                $Employee= Employee::find($id);
                $Employee->delete();

                return redirect('/admin/');
            }
        	else{
	    		return redirect('/home');
	    	}
	    }

	    else{
	    	return redirect('/login');
	    }
    }

}
