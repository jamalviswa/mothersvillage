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
use App\Discount;
class BlocksController extends Controller {
    
    public function index() {       
          $sessionadmin = Parent::checkadmin();
        $result = Discount::where('status', '<>', 'Trash')
                        ->orderBy('discount_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('discount', 'LIKE', "%$s%");   
            });              
        } 
        if (!empty($_REQUEST['pack'])) {
            $category = $_REQUEST['pack'];  
            $result->where(function ($query) use ($category) {
                 $query->where('pack', 'LIKE', "%$category%");   
            });              
        } 
        
        $result = $result->paginate(10);
        
        return view('/blocks/index', [
            'results' => $result
        ]);      
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/discounts/add', []);
    }
      public function store(Request $request)
    {
         $check= $this->validate($request, [
              'pack' => ['required'],
            'discount' => ['required'],
             'validity' => ['required'],
          
            'status' => ['required'],
        ]);
        
        
        
          $data = new Discount();
        $data->pack = $request->pack;
         $data->discount = $request->discount;
          $data->validity = !empty($request->validity) ? date("d-m-Y", strtotime($request->validity)) : "";
            $data->status = $request->status; 
        $data->created_date = date('Y-m-d H:i:s');
        $data->save();
         Session::flash('message', 'Discount Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('discounts.index', []);
        
    }
      public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Discount::where('discount_id', '=', $id)->first();
        return view('discounts/edit', ['detail' => $detail]);
    }
     public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
              'pack' => ['required'],
            'discount' => ['required'],
             'validity' => ['required'],
          
            'status' => ['required'],
        ]);
        $data = Discount::findOrFail($id);
        $data->pack = $request->pack;
         $data->discount = $request->discount;
          $data->validity = !empty($request->validity) ? date("d-m-Y", strtotime($request->validity)) : "";
            $data->status = $request->status; 
        $data->modified_date = date('Y-m-d H:i:s');
        $data->save();
         Session::flash('message', 'Discount Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('discounts.index', []);
        
    }
      public function delete(Request $request, $id = null)
    {        
            $data = Discount::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('discounts.index', []);
        }
          public function updateStatus(Request $request)
    {
    		// dd($request->all());
            $data = Discount::findOrFail($request->discount_id);
            $data->status = $request->status;
            $data->save();
            Session::flash('message', 'Status Updated Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
}
