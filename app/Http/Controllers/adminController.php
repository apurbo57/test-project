<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')
                    ->where('admin_email', $admin_email)
                    ->where('admin_password', $admin_password)
                    ->first();
        
                if ($result) {
                    Session::put('admin_name', $result->admin_name);
                    Session::put('admin_id', $result->id);
                    return redirect('dashboard');
                }else{
                    Session::flash('danger', 'Email or Password Invalid');
                    return redirect('admin');
                }
    }

    public function show_dash(){
        return view('admin.dashboard');
    }

    

    public function login(){
        return view('admin_login');
    }

    public function logout(){
        Session::flush();
        return redirect('admin');
    }
}
