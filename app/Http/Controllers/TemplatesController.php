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
use App\Activity;
use App\Maincard;
use App\Targetedarea;
use App\Lap;
class TemplatesController extends Controller {
    
    public function index() {       
        $sessionadmin = Parent::checkadmin();        
        return view('/templates/index');        
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/templates/add', []);
    }
      public function store(Request $request)
    {
         $check= $this->validate($request, [
              'activity' => ['required'],
            'maincard' => ['required'],
             'cardtype' => ['required'],
              'targeted_area' => ['required'],
             
            'name' => ['required',Rule::unique('templates')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })]
           
            
        ]);
          $data = new Template();
        $data->name = $request->name;
        $data->cardtype= $request->cardtype;
        $data->maincard = $request->maincard;
         $data->activity = $request->activity;
         $data->targeted_area = $request->targeted_area;
        $data->created_date = date('Y-m-d H:i:s');
       
        $data->save();
         Session::flash('message', 'Template Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('templates.index', []);
        
    }
}
