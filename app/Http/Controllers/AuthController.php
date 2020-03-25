<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest;
use App\Http\Requests\LoginCompanyRequest;
use Illuminate\Support\Facades\Session;
use Hash;
use App\Models\Company;

class AuthController extends Controller
{
    public function showSignUp(){
        return view('auth.register');
    }

    public function signUp(RegisterCompanyRequest $request){

         $company = Company::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'password' => Hash::make($request->input('password')),

       ]);

         return redirect()->route('login');
  
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(LoginCompanyRequest $request){
        $company = Company::where('email', $request->email)->first();
        if (empty($company)) {
            Session::flash("errors", ["The email is wrong"]);
         return redirect()->route('login');
        } elseif (password_verify($request->password, $company->password)) {
            Session::put("company", $company);
            return redirect('/companies');

        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }
}
