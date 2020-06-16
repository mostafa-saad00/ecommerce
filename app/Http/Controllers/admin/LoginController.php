<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
    	if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'roles' => 'admin']) )
    	{
            
    		return redirect()->route('admin.dashboard');
    	}
    	return back();
    }
}
