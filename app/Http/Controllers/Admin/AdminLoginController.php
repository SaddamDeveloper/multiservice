<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm(){
        return view('admin.index', ['url' => 'admin']);
    }

    public function adminLogin(Request $request){
        $this->validate($request, [
            'user_name'   => 'required',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['user_name' => $request->user_name, 'password' => $request->password])) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('user_name', 'remember'))->with('login_error','Username or password is incorrect');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
