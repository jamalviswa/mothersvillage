<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use App\Adminuser;
class AdminusersController extends Controller {
    public function login(Request $request) {    
        if ($request->isMethod('post')) {
            $adminuser = Adminuser::where('email', $request->email)->where('status', '<>','Trash')->first(); 
            if (!empty($adminuser)) {
                if ($adminuser->password == md5($request->password)) { 
                    // Session::set('User', $adminuser);
                    Session::put('Adminuser', $adminuser);
                   return Redirect::to('customers/personal/index');
                } else {
                    Session::flash('message', 'Email / Password mismatch');
                    Session::flash('alert-class', 'error');
                } 
            } else {
                Session::flash('message', 'Account not found');
                Session::flash('alert-class', 'error');
            }
        }
        return view('adminusers/login');
    }
    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
    public function profile(Request $request) {
        $sessionadmin = Parent::checkadmin();
        if ($request->isMethod('post')) {
            $adminuser = Adminuser::where('email', $request->email)->where('admin_id','!=',$sessionadmin->admin_id)->first();
            if (empty($adminuser)) {
                $data['username'] = $request->username;
                $data['email'] = $request->email;
                $file = $request->file('profile');
                if (!empty($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = uniqid() . '.' . $extension;
                    $file->move('public/files/admin', $fileName);
                    $data['profile'] = $fileName;
                } else {
                    $data['profile'] = $sessionadmin->profile;
                }
                Adminuser::where('admin_id', $sessionadmin->admin_id)->update($data);
                Session::flash('message', 'Profile updated!');
                Session::flash('alert-class', 'success');
                return Redirect::to('customers/personal/index');
            }
        }
        return view('adminusers/profile');
    }
    public function changepassword(Request $request) {
        $sessionadmin = Parent::checkadmin();
        if ($request->isMethod('post')) {
            if ($sessionadmin->password == md5($request->oldpassword)) {
                $data['password'] = md5($request->password);
                $data['password_text'] = $request->password;
                Adminuser::where('admin_id',$sessionadmin->admin_id)->update($data);
                Session::flash('message', 'Password updated!');
                Session::flash('alert-class', 'success');
                return Redirect::to('adminusers/profile');
            } else {
                Session::flash('message', 'Old password mismatch!');
                Session::flash('alert-class', 'error');
                return Redirect::to('adminusers/profile');
            }
        }
    }
}

    // public function dashboard() {
    //     Parent::checkadmin();
    //     return view('adminusers/dashboard');
    // }
   
   

