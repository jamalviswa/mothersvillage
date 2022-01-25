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
use App\Targetedarea;
class TargetedareasController extends Controller {
    
    public function index() {       
        $sessionadmin = Parent::checkadmin(); 
         $result = Targetedarea::where('status', '<>', 'Trash')
                        ->orderBy('target_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('name', 'LIKE', "%$s%") 
                  ->orWhere('short_code', 'LIKE', "%$s%");
            });              
        } 
        
        
        $result = $result->paginate(10);
         return view('/targetedareas/index', [
            'results' => $result
        ]);      
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/targetedareas/add', []);
    }
      public function store(Request $request)
    {
       
           $check= $this->validate($request, [
            'description' => ['required'],
            'short_code' => ['required'],
            'name' => ['required',Rule::unique('targetedareas')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })],
           
        ]);
        $data = new Targetedarea();
        $data->name = ucwords($request->name);
        $data->short_code = strtoupper($request->short_code);
        $data->description = $request->description;
        $data->created_date = date('Y-m-d H:i:s');
        // $data->status = $request->status; 
        $data->save();
         Session::flash('message', 'Targeted Area Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('targetedareas.index', []);
        
    }
     public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Targetedarea::where('target_id', '=', $id)->first();
        return view('targetedareas/edit', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
            'description' => ['required'],
             'short_code' => ['required'],
              'name' => ['required',
                     Rule::unique('targetedareas')->where(function ($query) use($request,$id) {
                         return $query->where('name', $request->name)->where('target_id','<>', $id)->where('status','<>', 'Trash');
                     })],
             
        ]);
        $data = Targetedarea::findOrFail($id);
        $data->name = ucwords($request->name);
         $data->short_code =strtoupper($request->short_code);
        $data->description = $request->description;
        $data->save();
         Session::flash('message', 'Targeted Area  Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('targetedareas.index', []);
        
    }
    // public function view($id = null)
    // {
    //     $sessionadmin = Parent::checkadmin();
    //     $detail = Category::where('category_id', '=', $id)->first();
    //     return view('targetedareas/view', ['detail' => $detail]);
    // }
    public function delete(Request $request, $id = null)
    {        
            $data = Targetedarea::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('targetedareas.index', []);
        }
}
