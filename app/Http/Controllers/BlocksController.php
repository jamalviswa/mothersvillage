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
use App\Flatnumber;
use App\Block;
use App\Flattype;
class BlocksController extends Controller {
    
    public function index() {       
          $sessionadmin = Parent::checkadmin();
      
        
        return view('/blocks/index', [
            
        ]);      
    }
    public function map(Request $request)
    {
        //$data = array();
        if (!empty($_REQUEST['phase'])) {
            $id = $_REQUEST['phase'];
            $blocks = Block::where('block_name', $id)->first();

           
            $flats = Flatnumber::where('block', $blocks['block_id'])->orderBy('flatnumber', 'asc')->get();
            //echo '<option value="">Select Block</option>';
            // print_r($flats);exit;
            foreach ($flats as $flat) {
              $flattype = Flattype::where('flattype_id', $flat['flattype'])->first();
             
               // echo '<option value="' . $block->block_id . '">' . $block->block_name . '</option>';
                echo '<div class="col-md-2 j-box lab-' .$flattype->flattype.'">
                <div class="j-numb">'
                . $flat->flatnumber. '<br>
                <span class="lab-'.$flattype->flattype.'lab">'.$flattype->flattype.'
                </div>
            </div>';
            }
            exit;
        }
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
