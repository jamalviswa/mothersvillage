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
use App\Modifier;
class ModifiersController extends Controller {
    
    public function index() {       
      $sessionadmin = Parent::checkadmin();
        $result = Modifier::where('status', '<>', 'Trash')
                        ->orderBy('modifier_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('name', 'LIKE', "%$s%") 
                 ->orWhere('short_code', 'LIKE', "%$s%");
            });              
        } 
       
        
        $result = $result->paginate(10);
        
        return view('/modifiers/index', [
            'results' => $result
        ]);    
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/modifiers/add', []);
    }
      public function store(Request $request)
    {
       
           $check= $this->validate($request, [
            
           
             'image' => ['required'],
             
            'modifier' => ['required',Rule::unique('modifiers')->where(function ($query) use($request) {
                return $query->where('modifier', $request->modifier)->where('status','<>', 'Trash');
            })],
           
        ]);
        $data = new Modifier();
        $data->modifier = ucwords($request->modifier);
      
      
        $data->created_date = date('Y-m-d H:i:s');
         $profile = $request->file('image');
                $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                $destinationPath = public_path('/files/modifier/');
                $chck= $profile->move($destinationPath, $imagename);
                $data->image = $imagename;
                
              
                 $data->status = "Active";   
         
        $data->save();
         Session::flash('message', 'Modifier Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('modifiers.index', []);
        
    }
     public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Modifier::where('modifier_id', '=', $id)->first();
        return view('modifiers/edit', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
          
            
              'modifier' => ['required',
                     Rule::unique('modifiers')->where(function ($query) use($request,$id) {
                         return $query->where('modifier', $request->modifier)->where('modifier_id','<>', $id)->where('status','<>', 'Trash');
                     })],
            
        ]);
        $data = Modifier::findOrFail($id);
        $data->modifier = $request->modifier;
         $data->modifier_date = date('Y-m-d H:i:s');
        if (!empty($request->file('image'))) {
                $profile = $request->file('image');
                    $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                    $destinationPath = public_path('/files/modifier/');
                    $chck= $profile->move($destinationPath, $imagename);
                    $data->image = $imagename;
                }
                
        $data->save();
         Session::flash('message', 'Modifier Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('modifiers.index', []);
        
    }
     public function delete(Request $request, $id = null)
    {        
            $data = Modifier::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('modifiers.index', []);
        }
}
