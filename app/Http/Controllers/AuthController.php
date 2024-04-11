<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $validateUser = Auth::attempt(['email' => $request->username, 'password' => $request->password]);
        if($validateUser)
        {
            Toastr::success('Successfully logged in!', 'Success');
            return redirect()->route('documents.index');
        }
        else
        {
            Toastr::error('Invalid username or password', 'Error');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
