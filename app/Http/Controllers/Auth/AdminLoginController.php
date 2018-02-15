<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm() {
    	return view('auth.admin-login');
    }

    public function login(Request $request) {
    	if (Auth::guard('admin-api')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return response()->json([
    				'status' => 'success'
    			]);
    	}

    	return response()->json([
    				'status' => 'Fail'
    			]);
    }

    public function __construct(){
    	$this->middleware('guest:admin-api');
    }
}
