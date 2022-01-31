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
use App\Customer;
use App\Family_detail;
class CustomersController extends Controller {
    
    public function index() {
       
        $sessionadmin = Parent::checkadmin();
        $result = Customer::where('status', '<>', 'Trash')
                        ->orderBy('customer_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('name', 'LIKE', "%$s%");   
            });              
        } 
        if (!empty($_REQUEST['category'])) {
            $category = $_REQUEST['category'];  
            $result->where(function ($query) use ($category) {
                 $query->where('category', 'LIKE', "%$category%");   
            });              
        } 
        
        $result = $result->paginate(10);
        
        return view('/customers/index', [
            'results' => $result
        ]);
        
        
    }


    //Customers Details add function


    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('customers/add', []);
    }
    public function store(Request $request){
        $check= $this->validate($request, [
            'fathers_name' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'occupation' => ['required'],
            'address' => ['required'],
            'income' => ['required'],
            'experience' => ['required'],
            'name' => ['required',Rule::unique('customers')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })],
        ]);
        $data = new Customer();
        $data->name = $request->name;
        $data->fathers_name = $request->fathers_name;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->income = $request->income;
        $data->email = $request->email;
        $data->occupation = $request->occupation;
        $data->experience = $request->experience;
        if (!empty($request->file('photo'))) {
            $image = $request->file('photo');
            $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files/customers/');
            $chck= $image->move($destinationPath, $imagename);          
            $data->photo = $imagename;
        }   
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active"; 
        $data->save();
        $last_id=$data->customer_id;
        if(!empty($request->son_profession)){
            if(!empty($request->son_age)){
                if (!empty($request->son_name)){
                    $n=sizeof($request->son_name);
                    $son_name=$request->son_name;
                    $son_profession=$request->son_profession;
                    $son_age=$request->son_age;
                    for($i=0;$i<$n;$i++){
                        $data = new Family_detail();
                        $data->customer_id=$last_id;
                        $data->son_profession = $son_profession[$i];
                        $data->son_age = $son_age[$i];
                        $data->son_name = $son_name[$i];
                        $data->status = "Active";
                        $data->save();
                    }
                }
            }
        }
        if(!empty($request->daughter_profession)){
            if(!empty($request->daughter_age)){
                if (!empty($request->daughter_name)){
                    $n=sizeof($request->daughter_name);
                    $daughter_name=$request->daughter_name;
                    $daughter_profession=$request->daughter_profession;
                    $daughter_age=$request->daughter_age;
                    for($i=0;$i<$n;$i++){
                        $data = new Family_detail();
                        $data->customer_id=$last_id;
                        $data->daughter_profession = $daughter_profession[$i];
                        $data->daughter_age = $daughter_age[$i];
                        $data->daughter_name = $daughter_name[$i];
                        $data->status = "Active";
                        $data->save();
                    }
                }
            }
        }
        Session::flash('message', 'Customer Personal Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('customers.index', []); 
    }


    public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Category::where('category_id', '=', $id)->first();
        return view('categories/edit', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {
    
        $check= $this->validate($request, [
            'description' => ['required'],
              'name' => ['required',
                     Rule::unique('categories')->where(function ($query) use($request,$id) {
                         return $query->where('name', $request->name)->where('category_id','<>', $id)->where('status','<>', 'Trash');
                     })],
             'status' => ['required'],
        ]);
        $data = Category::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->status = $request->status; 
        $data->save();
         Session::flash('message', 'Category Updated!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('categories.index', []);
        
    }
    public function view($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Category::where('category_id', '=', $id)->first();
        return view('categories/view', ['detail' => $detail]);
    }
    public function delete(Request $request, $id = null)
    {        
            $data = Category::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('categories.index', []);
        }
      public function updateStatus(Request $request)
    {
    		// dd($request->all());
            $data = Category::findOrFail($request->category_id);
            $data->status = $request->status;
            $data->save();
            Session::flash('message', 'Status Updated Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
}
