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
use App\Receipt;
use App\Customer;
use App\Cost;

class ReceiptsController extends Controller
{

    public function index()
    {
        $sessionadmin = Parent::checkadmin();
        $result = Payment::where('status', '<>', 'Trash')
            ->orderBy('payment_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $result->where(function ($query) use ($s) {
                $query->where('name', 'LIKE', "%$s%");
            });
        }
        if (!empty($_REQUEST['payment'])) {
            $package = $_REQUEST['payment'];
            $result->where(function ($query) use ($package) {
                $query->where('payment', 'LIKE', "%$package%");
            });
        }

        $result = $result->paginate(10);

        return view('/receipts/index', [
            'results' => $result
        ]);
    }
    public function add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('receipts/add', []);
    }
    public function store(Request $request)
    {
        $check = $this->validate($request, [
            'receipt_date' => ['required'],
            'received' => ['required'],
            'application_number' => ['required'],
            'final_amount' => ['required'],
        ]);
        $data = new Receipt();
        $receipts = App\Receipt::count();
        $receipt = $receipts + 1;
        $data->receipt_no = $receipt;
        $data->receipt_date = $request->receipt_date;
        $data->received = $request->received;
        $data->application_number = $request->application_number;
        $data->sum_rupees = $request->sum_rupees;
        $data->cheque_no = $request->cheque_no;
        $data->dated = $request->dated;
        $data->drawn_on = $request->drawn_on;
        $data->bank_towards = $request->bank_towards;
        $data->referred_by = $request->referred_by;
        $data->final_amount = $request->final_amount;
        $data->status = "Active";
        $data->created_date = date('Y-m-d H:i:s');
        $data->save();
        Session::flash('message', 'Receipt Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('receipts.index', []);
    }
    public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Package::where('package_id', '=', $id)->first();
        return view('packages/edit', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {

        $check = $this->validate($request, [
            'category' => ['required'],
            'num_cards' => ['required'],
            'pack' => ['required'],
            'price' => ['required'],
            'name' => [
                'required',
                Rule::unique('packages')->where(function ($query) use ($request, $id) {
                    return $query->where('name', $request->name)->where('package_id', '<>', $id)->where('status', '<>', 'Trash');
                })
            ],
            'status' => ['required'],
            'duration' => ['required'],
        ]);
        $data = Package::findOrFail($id);
        $data->name = $request->name;
        $data->pack = $request->pack;
        $data->num_cards = $request->num_cards;
        $data->category = $request->category;
        $data->price = ($request->pack == "Premium") ? $request->price : "";
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





    public function map(Request $request)
    {
        if (!empty($_REQUEST['application_name'])) {
            $id = $_REQUEST['application_name'];
            $names = Customer::where('customer_id', $id)->get();
            foreach ($names as $name) {
                echo '<input type="text" disabled class="form-control" name="applicant_name" value="' . $name->applicant_name . '"> ';
            }
            exit;
        } else  if (!empty($_REQUEST['application_date'])) {
            $id = $_REQUEST['application_date'];
            $dates = Customer::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control" name="date_of_application" value="' . $date->date_of_application . '"> ';
            }
            exit;
        } else  if (!empty($_REQUEST['gross_amount'])) {
            $id = $_REQUEST['gross_amount'];
            $dates = Cost::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control" id="purchase_price" name="gross_amount" value="' . $date->gross_amount . '"> ';
            }
            exit;
        }
    }
}
