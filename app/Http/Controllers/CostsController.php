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
use App\Block;
use App\Flatnumber;
use App\Flattype;
use App\Floor;


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
            'guideline_value' => ['required'],
            'electricity_charges' => ['required'],
            'water_supply' => ['required'],
            'car_park' => ['required'],
            'amenities_charges' => ['required'],
            'maintenance' => ['required'],
            'rate_sqft' => ['required'],
           
        ]);
        $data = new Cost();
        $data->customer_id = $request->application_number;
        $names = Customer::where('customer_id', $request->application_number)->first();
        $data->application_number = $names->application_number;
        $data->applicant_name = $names->applicant_name;
        $documents = Document::where('customer_id', $request->application_number)->first();
        $data->sal_area= $documents->salable_area;
        $data->uds_area = $documents->uds_area;
        $data->block = $documents->block;
        $data->flatnumber = $documents->flatnumber;
        $data->flattype = $documents->flattype;
        $data->floor = $documents->floor;
        $data->facing = $documents->facing;
        $data->rate_sqft= $request->rate_sqft;
        $salable_value = $request->rate_sqft * $documents->salable_area;
        $data->salable_value= $salable_value;
        $data->guideline_value= $request->guideline_value;
        $land_cost = $documents->uds_area * $request->guideline_value;
        $data->land_cost= $land_cost;
        $construction_cost = $salable_value - $land_cost;
        $data->construction_cost= $construction_cost;
        $data->electricity_charges= $request->electricity_charges;
        $data->water_supply= $request->water_supply;
        $data->car_park= $request->car_park;
        $data->amenities_charges= $request->amenities_charges;
        $data->maintenance= $request->maintenance;
        $gross_amount = $land_cost + $construction_cost + $request->electricity_charges + $request->water_supply + $request->car_park + $request->amenities_charges + $request->maintenance;
        $data->gross_amount= $gross_amount;
        $stamp = round(($land_cost * 7) / 100);
        $data->stamp= $stamp;
        $registration = round(($land_cost * 4) / 100);
        $data->registration= $registration;
        $construction = round((($construction_cost + $request->electricity_charges + $request->water_supply + $request->car_park + $request->amenities_charges + $request->maintenance) * 2) / 100);
        $data->construction= $construction;
        $data->corpus_fund= $request->corpus_fund;
        $gst = round(($gross_amount * 1) / 100);
        $data->gst= $gst;
        $data->created_date = date('Y-m-d H:i:s');
        $data->save();
         Session::flash('message', 'Cost Details Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('costs.index', []);
        
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
        }  else if (!empty($_REQUEST['block'])) {
            $id = $_REQUEST['block'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                $block = Block::where('block_id', $name['block'])->first();
                echo '<input type="text" disabled class="form-control" name="block"  value="' . $block->block_name . '"> ';
            }
            exit;
        }  else if (!empty($_REQUEST['flatnumber'])) {
            $id = $_REQUEST['flatnumber'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                $block = Flatnumber::where('flatnumber_id', $name['flatnumber'])->first();
                echo '<input type="text" disabled class="form-control" name="flatnumber"  value="' . $block->flatnumber . '"> ';
            }
            exit;
        }  else if (!empty($_REQUEST['flattype'])) {
            $id = $_REQUEST['flattype'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                $block = Flattype::where('flattype_id', $name['flattype'])->first();
                echo '<input type="text" disabled class="form-control" name="flattype"  value="' . $block->flattype . '"> ';
            }
            exit;
        } else if (!empty($_REQUEST['floor'])) {
            $id = $_REQUEST['floor'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                $block = Floor::where('floor_id', $name['floor'])->first();
                echo '<input type="text" disabled class="form-control" name="floor"  value="' . $block->floor_name . '"> ';
            }
            exit;
        } else if (!empty($_REQUEST['facing'])) {
            $id = $_REQUEST['facing'];
            $names = Document::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control" name="facing"  value="' . $name->facing . '"> ';
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
