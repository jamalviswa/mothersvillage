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
use App\Phase;
use App\Family_detail;
class MastersController extends Controller {

//Phase Details index function

    public function phase_index() { 
        $sessionadmin = Parent::checkadmin();
        $result = Phase::where('status', '<>', 'Trash')->orderBy('phase_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];    
            $result->where(function ($query) use ($s) {
                 $query->where('phase_name', 'LIKE', "%$s%");   
            });              
        } 
        $result = $result->paginate(10);
        return view('/masters/phase_index', [
            'results' => $result
        ]);  
    }

//Phase Details add function

    public function phase_add() {
        $sessionadmin = Parent::checkadmin();
        return view('masters/phase_add', []);
    }
    public function phase_store(Request $request){
        $sessionadmin = Parent::checkadmin();
        $check= $this->validate($request, [
            'phase_name' => ['required',Rule::unique('phases')->where(function ($query) use($request) {
                return $query->where('phase_name', $request->phase_name)->where('status','<>', 'Trash');
            })],
        ]);
        $data = new Phase();
        $data->phase_name = $request->phase_name;  
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active"; 
        $data->save();
        Session::flash('message', 'Phase Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('masters.phase_index', []); 
    }

//Phase Details delete function

    public function phase_delete(Request $request, $id = null)
    {        
            $data = Phase::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('masters.phase_index', []);
        }


        public function official_index() { 
            $sessionadmin = Parent::checkadmin();
            $result = Customer::where('status', '<>', 'Trash')->orderBy('customer_id', 'desc');
            if (!empty($_REQUEST['s'])) {
                $s = $_REQUEST['s'];    
                $result->where(function ($query) use ($s) {
                     $query->where('name', 'LIKE', "%$s%");   
                });              
            } 
            if (!empty($_REQUEST['customer'])) {
                $category = $_REQUEST['customer'];  
                $result->where(function ($query) use ($category) {
                     $query->where('customer', 'LIKE', "%$category%");   
                });              
            } 
            $result = $result->paginate(10);
            return view('/customers/official_index', [
                'results' => $result
            ]);  
        }

        public function official_add() {
            $sessionadmin = Parent::checkadmin();
            return view('customers/official_add', []);
        }
        public function official_store(Request $request){
            $check= $this->validate($request, [
                'fathers_name' => ['required'],
                'age' => ['required'],
                'gender' => ['required'],
                'phone' => ['required'],
                'name' => ['required'],
                'occupation' => ['required'],
                'address' => ['required'],
                'income' => ['required'],
                'experience' => ['required'],
                'email' => ['required',Rule::unique('customers')->where(function ($query) use($request) {
                    return $query->where('email', $request->email)->where('status','<>', 'Trash');
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
            return \Redirect::route('customers.official_index', []); 
        }
     
}
