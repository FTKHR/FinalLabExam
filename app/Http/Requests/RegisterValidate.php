<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required|min:4|max:20|unique:App\employee,username',
            'password'=>'required|min:5|max:20|confirmed',
            'companyName'=>'required',
            'contactNumber'=>'required|min:11|numeric'

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Full name required',
            'username.Required'=>'username required',
            'username.uniqe'=>'username already exists',
            'username.min'=>'username must be atleast 4 characters',
            'username.max'=>'username can not have more than 20 characters',
            'companyName.required'=>'Company name is required',
            'password.required'=>'password is required',
            'password.min'=>'password can not be less than 5',
            'password.max'=>'password can not have more than 20 characters',
            'password.confirmed'=>'passwords dont match',
            'contactNumber.required'=>'phone number is required',
            'contactNumber.min'=>'Phone number must be 11 digits',
            'contactNumber.numeric'=>'Phone number must be numeric'
        ];
    }
}
