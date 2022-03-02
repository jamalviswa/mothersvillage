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
use App\Cost;
use App\Customer;
use App\Document;

class CostsController extends Controller {
    
    public function index() {       
         $sessionadmin = Parent::checkadmin();
       
       
        
        return view('/costs/index', [
           
        ]);      
    }
    
    public function add() {
         $sessionadmin = Parent::checkadmin();
        return view('costs/add', []);
    }
     public function store(Request $request)
    {
         $check= $this->validate($request, [
              'category' => ['required'],
            'num_cards' => ['required'],
             'price' => ['required'],
            'name' => ['required',Rule::unique('packages')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })],
           
            'duration' => ['required'],
        ]);
          $data = new Cost();
        $data->name = $request->name;
        $data->pack= $request->pack;
        $data->num_cards = $request->num_cards;
         $data->category = $request->category;
         $data->price = ($request->pack=="Premium") ? $request->price : "-";
        $data->created_date = date('Y-m-d H:i:s');
        $data->duration = $request->duration; 
        $data->save();
         Session::flash('message', 'Package Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('payments.index', []);
        
    }
    public function map(Request $request)
    {
        if (!empty($_REQUEST['application_name'])) {
            $id = $_REQUEST['application_name'];
            $names = Customer::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control"  name="applicant_name" value="' . $name->applicant_name . '"> ';
            }
            exit;
        } else if (!empty($_REQUEST['salable_area'])) {
            $id = $_REQUEST['salable_area'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control" name="sal_area" id="Text2" value="' . $name->salable_area . '"> ';
            }
            exit;
        }  else if (!empty($_REQUEST['uds_area'])) {
            $id = $_REQUEST['uds_area'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control" name="uds_area" id="Text3" value="' . $name->uds_area . '"> ';
            }
            exit;
        }
    }
     public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Package::where('package_id', '=', $id)->first();
        return view('packages/edit', ['detail' => $detail]);
    }
      public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
            'category' => ['required'],
            'num_cards' => ['required'],
              'pack' => ['required'],
             'price' => ['required'],
            'name' => ['required',
                     Rule::unique('packages')->where(function ($query) use($request,$id) {
                         return $query->where('name', $request->name)->where('package_id','<>', $id)->where('status','<>', 'Trash');
                     })],
                     'status' => ['required'],
            'duration' => ['required'],
        ]);
        $data = Package::findOrFail($id);
        $data->name = $request->name;
        $data->pack = $request->pack;
        $data->num_cards = $request->num_cards;
         $data->category = $request->category;
         $data->price = ($request->pack=="Premium") ? $request->price : "";
           $data->duration = $request->duration; 
            $data->status = $request->status; 
        $data->save();
         Session::flash('message', 'Package Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('packages.index', []);
        
    }
      public function delete(Request $request, $id = null)
    {        
            $data = Package::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('packages.index', []);
        }
          public function updateStatus(Request $request)
    {
    		// dd($request->all());
            $data = Package::findOrFail($request->package_id);
            $data->status = $request->status;
            $data->save();
            Session::flash('message', 'Status Updated Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
}
