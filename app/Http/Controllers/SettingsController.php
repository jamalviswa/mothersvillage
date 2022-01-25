<?php
namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rules\Mobile;
use App\Rules\Email;
use Session;
use DB;
use Redirect;
use App\Setting;
class SettingsController extends Controller {
    
    public function index() {       
        $sessionadmin = Parent::checkadmin();        
        return view('/settings/index');        
    }
     public function store(Request $request)
    {
       
           $check= $this->validate($request, [
            'monthly_description' => ['required'],
            'terms_conditions' => ['required'],
             'site_title' => ['required'],
              'logo' => ['required'],
               'max_workoutfreeusers' => ['required'],
               'max_workoutpremiumusers' => ['required'],
            'status' => ['required'],
        ]);
        $data = new Setting();
        $data->terms_conditions = $request->terms_conditions;
          $data->site_title = $request->site_title;
            $data->max_workoutfreeusers = $request->max_workoutfreeusers;
              $data->max_workoutpremiumusers = $request->max_workoutpremiumusers;
              if (!empty($request->file('logo'))) {
                $profile = $request->file('logo');
                    $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                    $destinationPath = public_path('/files/setting/');
                    $chck= $profile->move($destinationPath, $imagename);
                    $data->logo = $imagename;
                }
        $data->monthly_description = $request->monthly_description;
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active"; 
        $data->save();
         Session::flash('message', 'Settings Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('settings.index', []);
        
    }
   
}
