<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\responses;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    use responses;
    public function register()
    {
        return view('backend.user.register');
    }

    public function login()
    {
        return view('backend.user.login');
    }

    public function loginuser(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            // Auth::login();
            return redirect(route('dashboard'))->with(['success' => true, 'msg' => 'Invalid login details']);;
        } else {
            Auth::logout();
            return redirect()->back()->with(['success' => true, 'msg' => 'Invalid login details']);
        }
    }


    public function registeruser(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|string',
            'phone' => 'required|string|size:11',
            'password' => 'required|same:password_confirmation',
            'email' => 'required|email',
            'password_confirmation' => 'required'
        ]);


        $user = new user();
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->password = bcrypt($req->password);
        $user->email = $req->email;
        $user->role_id = $this->user_role();
        try {
            $user->save();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with(['success' => false, 'msg' => $th->getMessage()]);
        }
        return redirect(route('loginuser'))->with(['success' => true, 'msg' => "successfully register pls login"]);
    }
}
