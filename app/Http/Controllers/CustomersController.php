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
use App\Block;
use App\Floor;
use App\Flattype;
use App\Flatnumber;
use App\Document;
use App\Son;
use App\Daughter;

class CustomersController extends Controller
{

    //Customers Details add function

    public function personal_index()
    {
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
        return view('/customers/personal_index', [
            'results' => $result
        ]);
    }

    //Customers Details add function

    public function personal_add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('customers/personal_add', []);
    }
    public function personal_store(Request $request)
    {
        $check = $this->validate($request, [
            'applicant_name' => ['required'],
            'date_of_application' => ['required'],
            'fathers_name' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'phone_code' => ['required'],
            'photo' => ['required'],
            'email' => [
                'required', 'email', 'regex:/^\S*$/u',
                'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/', Rule::unique('customers')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email)->where('status', '<>', 'Trash');
                })
            ],
            'phone' => [
                'required', 'numeric', 'digits_between:1,15',
                Rule::unique('customers')->where(function ($query) use ($request) {
                    return $query->where('phone', $request->phone)->where('status', '<>', 'Trash');
                })
            ],
            'application_number' => ['required', Rule::unique('customers')->where(function ($query) use ($request) {
                return $query->where('application_number', $request->application_number)->where('status', '<>', 'Trash');
            })],
        ]);
        $data = new Customer();
        $data->applicant_name = $request->applicant_name;
        $data->application_number = $request->application_number;
        $data->date_of_application = $request->date_of_application;
        $data->fathers_name = $request->fathers_name;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->phone_code = $request->phone_code;
        $data->phone = $request->phone;
        $data->altphone_code = $request->altphone_code;
        $data->altphone = $request->altphone;
        $data->permanent_address = $request->permanent_address;
        $data->present_address = $request->present_address;
        $data->income = $request->income;
        $data->email = $request->email;
        $data->occupation = $request->occupation;
        $data->experience = $request->experience;
        if (!empty($request->file('photo'))) {
            $image = $request->file('photo');
            $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files/customers/');
            $chck = $image->move($destinationPath, $imagename);
            $data->photo = $imagename;
        }
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active";
        $data->save();
        $last_id = $data->customer_id;
        if (!empty($request->son_school)) {
            if (!empty($request->son_class)) {
                if (!empty($request->son_profession)) {
                    if (!empty($request->son_age)) {
                        if (!empty($request->son_name)) {
                            $n = sizeof($request->son_name);
                            $son_name = $request->son_name;
                            $son_profession = $request->son_profession;
                            $son_school = $request->son_school;
                            $son_class = $request->son_class;
                            $son_age = $request->son_age;
                            for ($i = 0; $i < $n; $i++) {
                                $data = new Son();
                                $data->customer_id = $last_id;
                                $data->son_class = $son_class[$i];
                                $data->son_school = $son_school[$i];
                                $data->son_profession = $son_profession[$i];
                                $data->son_age = $son_age[$i];
                                $data->son_name = $son_name[$i];
                                $data->status = "Active";
                                $data->save();
                            }
                        }
                    }
                }
            }
        }
        if (!empty($request->daughter_school)) {
            if (!empty($request->daughter_class)) {
                if (!empty($request->daughter_profession)) {
                    if (!empty($request->daughter_age)) {
                        if (!empty($request->daughter_name)) {
                            $n = sizeof($request->daughter_name);
                            $daughter_name = $request->daughter_name;
                            $daughter_school = $request->daughter_school;
                            $daughter_class = $request->daughter_class;
                            $daughter_profession = $request->daughter_profession;
                            $daughter_age = $request->daughter_age;
                            for ($i = 0; $i < $n; $i++) {
                                $data = new Daughter();
                                $data->customer_id = $last_id;
                                $data->daughter_class = $daughter_class[$i];
                                $data->daughter_school = $daughter_school[$i];
                                $data->daughter_profession = $daughter_profession[$i];
                                $data->daughter_age = $daughter_age[$i];
                                $data->daughter_name = $daughter_name[$i];
                                $data->status = "Active";
                                $data->save();
                            }
                        }
                    }
                }
            }
        }
        Session::flash('message', 'Customer Personal Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('customers.personal_index', []);
    }

    //Customers Details edit function

    public function personal_edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Customer::where('customer_id', '=', $id)->first();
        return view('customers/personal_edit', ['detail' => $detail]);
    }
    public function personal_update(Request $request, $id = null)
    {

        $check = $this->validate($request, [
            'fathers_name' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
            'name' => ['required'],
            'occupation' => ['required'],
            'address' => ['required'],
            'income' => ['required'],
            'experience' => ['required'],
            'email' => ['required', Rule::unique('customers')->where(function ($query) use ($request, $id) {
                return $query->where('email', $request->email)->where('customer_id', '<>', $id)->where('status', '<>', 'Trash');
            })],
        ]);
        $data = Customer::findOrFail($id);
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
            $chck = $image->move($destinationPath, $imagename);
            $data->photo = $imagename;
        }
        $data->modified_date = date('Y-m-d H:i:s');
        $data->save();
        if (!empty($request->son_profession)) {
            if (!empty($request->son_age)) {
                if (!empty($request->son_name)) {
                    $delete = Son::where('customer_id', $id)->delete();
                    $n = sizeof($request->son_name);
                    $son_name = $request->son_name;
                    $son_profession = $request->son_profession;
                    $son_age = $request->son_age;
                    for ($i = 0; $i < $n; $i++) {
                        $data = new Son();
                        $data->customer_id = $id;
                        $data->son_profession = $son_profession[$i];
                        $data->son_age = $son_age[$i];
                        $data->son_name = $son_name[$i];
                        $data->status = "Active";
                        $data->save();
                    }
                }
            }
        }
        if (!empty($request->daughter_profession)) {
            if (!empty($request->daughter_age)) {
                if (!empty($request->daughter_name)) {
                    $delete = Family_detail::where('customer_id', $id)->delete();
                    $n = sizeof($request->daughter_name);
                    $daughter_name = $request->daughter_name;
                    $daughter_profession = $request->daughter_profession;
                    $daughter_age = $request->daughter_age;
                    for ($i = 0; $i < $n; $i++) {
                        $data = new Family_detail();
                        $data->customer_id = $id;
                        $data->daughter_profession = $daughter_profession[$i];
                        $data->daughter_age = $daughter_age[$i];
                        $data->daughter_name = $daughter_name[$i];
                        $data->status = "Active";
                        $data->save();
                    }
                }
            }
        }
        Session::flash('message', 'Customer Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('customers.personal_index', []);
    }


    public function personal_view($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Customer::where('customer_id', '=', $id)->first();
        return view('customers/personal_view', ['detail' => $detail]);
    }

    //Customers Details delete function

    public function personal_delete(Request $request, $id = null)
    {
        $data = Customer::findOrFail($id);
        $data->status = 'Trash';
        $data->save();
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('customers.personal_index', []);
    }


    public function official_index()
    {
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

    public function official_add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('customers/official_add', []);
    }
    public function official_store(Request $request)
    {
        
        $check = $this->validate($request, [
            'phase' => ['required'],
            'block' => ['required'],
            'floor' => ['required'],
            'flattype' => ['required'],
            'flatnumber' => ['required'],
            'facing' => ['required'],
            'salable_area' => ['required'],
            'plinth_area' => ['required'],
            'uds_area' => ['required'],
            'comn_area' => ['required'],

           
        ]);
       // print_r($request->aadhar_number);exit;
        $data = new Document();
        $data->customer_id = $request->application_number;
        $names = Customer::where('customer_id', $request->application_number)->first();
        
         
         $data->application_number = $names->application_number;
          $data->date_of_application = $names->date_of_application;
         $data->applicant_name = $names->applicant_name;
         $data->phone = $names->phone;
        $data->phone_code = $names->phone_code;
        
        //$data->date_of_application = $request->date_of_application;
        $data->phase = $request->phase;
        $data->block = $request->block;
        $data->floor = $request->floor;
        $data->flattype = $request->flattype;
        $data->flatnumber = $request->flatnumber;
        $data->facing = $request->facing;
        $data->salable_area = $request->salable_area;
        $data->plinth_area = $request->plinth_area;
        $data->uds_area = $request->uds_area;
        $data->comn_area = $request->comn_area;
        $data->aadhar_number = $request->aadhar_number;
        
        $data->pan_number = $request->pan_number;
        $data->passport_number = $request->passport_number;
        
        $data->coapp_phone = $request->coapp_phone;
        $data->coapp_phone_code = $request->coapp_phone_code;
        $data->co_applicant_name = $request->co_applicant_name;
        $data->coapp_address = $request->coapp_address;
        $data->coapp_email = $request->coapp_email;
        $data->coaadhar_number = $request->coaadhar_number;
        $data->copan_number = $request->copan_number;
        $data->copassport_number = $request->copassport_number;
        if (!empty($request->file('aadhar'))) {
            $aadhar = $request->file('aadhar');
            $aadhar_struc = uniqid() . '.' . $aadhar->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $aadhar->move($destinationPath, $aadhar_struc);
            $data->aadhar  = $aadhar_struc;
        }
        if (!empty($request->file('pan'))) {
            $pan = $request->file('pan');
            $pan_struc = uniqid() . '.' . $pan->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $pan->move($destinationPath, $pan_struc);
            $data->pan  = $pan_struc;
        }      
        if (!empty($request->file('passport'))) {
            $passport = $request->file('passport');
            $passport_struc = uniqid() . '.' . $passport->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $passport->move($destinationPath, $passport_struc);
            $data->passport  = $passport_struc;
        }      
        if (!empty($request->file('coaadhar'))) {
            $coaadhar = $request->file('coaadhar');
            $coaadhar_struc = uniqid() . '.' . $coaadhar->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $coaadhar->move($destinationPath, $coaadhar_struc);
            $data->coaadhar  = $coaadhar_struc;
        }      
        if (!empty($request->file('copan'))) {
            $copan = $request->file('copan');
            $copan_struc = uniqid() . '.' . $copan->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $copan->move($destinationPath, $copan_struc);
            $data->copan  = $copan_struc;
        }    
        if (!empty($request->file('copassport'))) {
            $copassport = $request->file('copassport');
            $copassport_struc = uniqid() . '.' . $copassport->getClientOriginalExtension();
            $destinationPath = public_path('/files/forms/');
            $chck = $copassport->move($destinationPath, $copassport_struc);
            $data->copassport  = $copassport_struc;
        }
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active";
       
        $data->save();
        Session::flash('message', 'Customer Document Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('customers.official_index', []);
    }

    public function map(Request $request)
    {
        if (!empty($_REQUEST['phase'])) {
            $id = $_REQUEST['phase'];
            $blocks = Block::where('phase_id', $id)->get();
            echo '<option value="">Select Block</option>';
            foreach ($blocks as $block) {
                echo '<option value="' . $block->block_id . '">' . $block->block_name . '</option>';
            }
            exit;
        } else  if (!empty($_REQUEST['block'])) {
            $id = $_REQUEST['block'];
            $floors = Floor::where('block', $id)->get();
            echo '<option value="">Select Floor</option>';
            foreach ($floors as $floor) {
                echo '<option value="' . $floor->floor_id . '">' . $floor->floor_name . '</option>';
            }
            exit;
        } else  if (!empty($_REQUEST['floor'])) {
            $id = $_REQUEST['floor'];
            $flattypes = Flattype::where('floor', $id)->get();
            echo '<option value="">Select Flat Type</option>';
            foreach ($flattypes as $flattype) {
                echo '<option value="' . $flattype->flattype_id . '">' . $flattype->flattype . '</option>';
            }
            exit;
        } else  if (!empty($_REQUEST['flattype'])) {
            $id = $_REQUEST['flattype'];
            $flatnumbers = Flatnumber::where('flattype', $id)->get();
            echo '<option value="">Select Flat Number</option>';
            foreach ($flatnumbers as $flatnumber) {
                echo '<option value="' . $flatnumber->flatnumber_id . '">' . $flatnumber->flatnumber . '</option>';
            }
            exit;
        } 
    }
   
    public function maps(Request $request)
    {
        if (!empty($_REQUEST['application_name'])) {
            $id = $_REQUEST['application_name'];
            $names = Customer::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control"  value="' . $name->applicant_name . '"> ';
            }
            exit;
        } else  if (!empty($_REQUEST['application_date'])) {
            $id = $_REQUEST['application_date'];
            $dates = Customer::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control"  value="' . $date->date_of_application . '"> ';
            }
            exit;
        } else  if (!empty($_REQUEST['phone_code'])) {
            $id = $_REQUEST['phone_code'];
            $dates = Customer::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control"  value="' . $date->phone_code . '"> ';
            }
            exit;
        }
        else  if (!empty($_REQUEST['phone'])) {
            $id = $_REQUEST['phone'];
            $dates = Customer::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control"  value="' . $date->phone . '"> ';
            }
            exit;
        }
    }
}
