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
class ActivitiesController extends Controller {
    
    public function index() {       
      $sessionadmin = Parent::checkadmin();
        $result = Activity::where('status', '<>', 'Trash')
                        ->orderBy('activity_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('name', 'LIKE', "%$s%") 
                 ->orWhere('short_code', 'LIKE', "%$s%");
            });              
        } 
       
        
        $result = $result->paginate(10);
        
        return view('/activities/index', [
            'results' => $result
        ]);    
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/activities/add', []);
    }
      public function store(Request $request)
    {
       
           $check= $this->validate($request, [
            'description' => ['required'],
            'short_code' => ['required'],
             'image' => ['required'],
              'icon' => ['required'],
            'name' => ['required',Rule::unique('activities')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })],
           
        ]);
        $data = new Activity();
        $data->name = ucwords($request->name);
        $data->short_code = strtoupper($request->short_code);
        $data->description = $request->description;
        $data->created_date = date('Y-m-d H:i:s');
         $profile = $request->file('image');
                $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                $destinationPath = public_path('/files/activity/');
                $chck= $profile->move($destinationPath, $imagename);
                $data->image = $imagename;
                 $icon = $request->file('icon');
                $imagename = uniqid() . '.' . $icon->getClientOriginalExtension();
                $destinationPath = public_path('/files/activity/icon/');
                $chck= $icon->move($destinationPath, $imagename);
                $data->icon = $imagename;
                 $data->status = "Active";   
         
        $data->save();
         Session::flash('message', 'Activity Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('activities.index', []);
        
    }
     public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Activity::where('activity_id', '=', $id)->first();
        return view('activities/edit', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
            'description' => ['required'],
              'short_code' => ['required'],
            
              'name' => ['required',
                     Rule::unique('activities')->where(function ($query) use($request,$id) {
                         return $query->where('name', $request->name)->where('activity_id','<>', $id)->where('status','<>', 'Trash');
                     })],
            
        ]);
        $data = Activity::findOrFail($id);
        $data->name = $request->name;
        $data->short_code = strtoupper($request->short_code);
        $data->description = $request->description;
        if (!empty($request->file('image'))) {
                $profile = $request->file('image');
                    $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                    $destinationPath = public_path('/files/activity/');
                    $chck= $profile->move($destinationPath, $imagename);
                    $data->image = $imagename;
                }
                 if (!empty($request->file('icon'))) {
                $profile = $request->file('icon');
                    $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                    $destinationPath = public_path('/files/activity/icon/');
                    $chck= $profile->move($destinationPath, $imagename);
                    $data->icon = $imagename;
                }
        $data->save();
         Session::flash('message', 'Activity Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('activities.index', []);
        
    }
     public function delete(Request $request, $id = null)
    {        
            $data = Activity::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('activities.index', []);
        }
}
