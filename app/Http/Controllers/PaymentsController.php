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
use App\Payment;
use App\Customer;
use App\Cost;

class PaymentsController extends Controller
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

        return view('/payments/index', [
            'results' => $result
        ]);
    }
    public function add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('payments/add', []);
    }
    public function store(Request $request)
    {
        $check = $this->validate($request, [
           
        ]);
        $data = new Payment();
        $data->customer_id = $request->application_number;
        $names = Customer::where('customer_id', $request->application_number)->first();
        $data->application_number = $names->application_number;
        $data->applicant_name = $names->applicant_name;
        $data->date_of_application = $names->date_of_application;
        $documents = Cost::where('customer_id', $request->application_number)->first();
        $data->cost_id = $documents->cost_id;
        $data->gross_amount = $documents->gross_amount;
        $data->payment_schedule = $request->payment_schedule;

        $onbook10per = round(($data->gross_amount * 10) / 100);
        $data->onbook10per = $onbook10per;
        $data->onbook_received10per = $request->onbook_received10per;
        $balance = $data->onbook10per - $data->onbook_received10per;
        $data->onbook_balance10per = $balance;
        $data->onbook_paymentdate10per = $request->onbook_paymentdate10per;
        $data->onbook_transactiontype10per = $request->onbook_transactiontype10per;
        $data->onbook_paymenttype10per = $request->onbook_paymenttype10per;
        $data->onbook_chequenumber10per = ($request->onbook_paymenttype10per == "Cheque") ? $request->onbook_chequenumber10per : "-";
        $data->onbook_neftid10per = ($request->onbook_paymenttype10per == "NEFT") ? $request->onbook_neftid10per : "-";

        $payments10per = round(($data->gross_amount * 40) / 100);
        $data->payments10per = $payments10per;
        $data->payments_received10per = $request->payments_received10per;
        $balance = $data->payments10per - $data->payments_received10per;
        $data->payments_balance10per = $balance;
        $data->payments_paymentdate10per = $request->payments_paymentdate10per;
        $data->payments_transactiontype10per = $request->payments_transactiontype10per;
        $data->payments_paymenttype10per = $request->payments_paymenttype10per;
        $data->payments_chequenumber10per = ($request->payments_paymenttype10per == "Cheque") ? $request->payments_chequenumber10per : "-";
        $data->payments_neftid10per = ($request->payments_paymenttype10per == "NEFT") ? $request->payments_neftid10per : "-";

        $first10per = round(($data->gross_amount * 10) / 100);
        $data->first10per = $first10per;
        $data->first_received10per = $request->first_received10per;
        $balance = $data->first10per - $data->first_received10per;
        $data->first_balance10per = $balance;
        $data->first_paymentdate10per = $request->first_paymentdate10per;
        $data->first_transactiontype10per = $request->first_transactiontype10per;
        $data->first_paymenttype10per = $request->first_paymenttype10per;
        $data->first_chequenumber10per = ($request->first_paymenttype10per == "Cheque") ? $request->first_chequenumber10per : "-";
        $data->first_neftid10per = ($request->first_paymenttype10per == "NEFT") ? $request->first_neftid10per : "-";

        $second10per = round(($data->gross_amount * 10) / 100);
        $data->second10per = $second10per;
        $data->second_received10per = $request->second_received10per;
        $balance = $data->second10per - $data->second_received10per;
        $data->second_balance10per = $balance;
        $data->second_paymentdate10per = $request->second_paymentdate10per;
        $data->second_transactiontype10per = $request->second_transactiontype10per;
        $data->second_paymenttype10per = $request->second_paymenttype10per;
        $data->second_chequenumber10per = ($request->second_paymenttype10per == "Cheque") ? $request->second_chequenumber10per : "-";
        $data->second_neftid10per = ($request->second_paymenttype10per == "NEFT") ? $request->second_neftid10per : "-";

        $third10per = round(($data->gross_amount * 10) / 100);
        $data->third10per = $third10per;
        $data->third_received10per = $request->third_received10per;
        $balance = $data->third10per - $data->third_received10per;
        $data->third_balance10per = $balance;
        $data->third_paymentdate10per = $request->third_paymentdate10per;
        $data->third_transactiontype10per = $request->third_transactiontype10per;
        $data->third_paymenttype10per = $request->third_paymenttype10per;
        $data->third_chequenumber10per = ($request->third_paymenttype10per == "Cheque") ? $request->third_chequenumber10per : "-";
        $data->third_neftid10per = ($request->third_paymenttype10per == "NEFT") ? $request->third_neftid10per : "-";

        $fourth10per = round(($data->gross_amount * 10) / 100);
        $data->fourth10per = $fourth10per;
        $data->fourth_received10per = $request->fourth_received10per;
        $balance = $data->fourth10per - $data->fourth_received10per;
        $data->fourth_balance10per = $balance;
        $data->fourth_paymentdate10per = $request->fourth_paymentdate10per;
        $data->fourth_transactiontype10per = $request->fourth_transactiontype10per;
        $data->fourth_paymenttype10per = $request->fourth_paymenttype10per;
        $data->fourth_chequenumber10per = ($request->fourth_paymenttype10per == "Cheque") ? $request->fourth_chequenumber10per : "-";
        $data->fourth_neftid10per = ($request->fourth_paymenttype10per == "NEFT") ? $request->fourth_neftid10per : "-";

        $fifth10per = round(($data->gross_amount * 5) / 100);
        $data->fifth10per = $fifth10per;
        $data->fifth_received10per = $request->fifth_received10per;
        $balance = $data->fifth10per - $data->fifth_received10per;
        $data->fifth_balance10per = $balance;
        $data->fifth_paymentdate10per = $request->fifth_paymentdate10per;
        $data->fifth_transactiontype10per = $request->fifth_transactiontype10per;
        $data->fifth_paymenttype10per = $request->fifth_paymenttype10per;
        $data->fifth_chequenumber10per = ($request->fifth_paymenttype10per == "Cheque") ? $request->fifth_chequenumber10per : "-";
        $data->fifth_neftid10per = ($request->fifth_paymenttype10per == "NEFT") ? $request->fifth_neftid10per : "-";

        $handover10per = round(($data->gross_amount * 5) / 100);
        $data->handover10per = $handover10per;
        $data->handover_received10per = $request->handover_received10per;
        $balance = $data->handover10per - $data->handover_received10per;
        $data->handover_balance10per = $balance;
        $data->handover_paymentdate10per = $request->handover_paymentdate10per;
        $data->handover_transactiontype10per = $request->handover_transactiontype10per;
        $data->handover_paymenttype10per = $request->handover_paymenttype10per;
        $data->handover_chequenumber10per = ($request->handover_paymenttype10per == "Cheque") ? $request->handover_chequenumber10per : "-";
        $data->handover_neftid10per = ($request->handover_paymenttype10per == "NEFT") ? $request->handover_neftid10per : "-";

        $data->created_date = date('Y-m-d H:i:s');
        $data->save();
        Session::flash('message', 'Payment Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('payments.index', []);
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
                echo '<input type="text" disabled class="form-control" name="appln_name" value="' . $name->applicant_name . '"> ';
            }
            exit;
        } else  if (!empty($_REQUEST['application_date'])) {
            $id = $_REQUEST['application_date'];
            $dates = Customer::where('customer_id', $id)->get();
            foreach ($dates as $date) {
                echo ' <input type="text" disabled class="form-control" name="appln_date" value="' . $date->date_of_application . '"> ';
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
