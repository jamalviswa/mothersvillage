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
        $check = $this->validate($request, []);
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
        $data->onbook_received10per = $request->onbook_received10per ? $request->onbook_received10per : "0";
        $balance = $data->onbook10per - $data->onbook_received10per;
        $data->onbook_balance10per = $balance;
        $data->onbook_paymentdate10per = $request->onbook_paymentdate10per ? $request->onbook_paymentdate10per : "-";
        $data->onbook_transactiontype10per = $request->onbook_transactiontype10per ? $request->onbook_transactiontype10per : "-";
        $data->onbook_paymenttype10per = $request->onbook_paymenttype10per ? $request->onbook_transactiontype10per : "-";
        $data->onbook_chequenumber10per = ($request->onbook_paymenttype10per == "Cheque") ? $request->onbook_chequenumber10per : "-";
        $data->onbook_neftid10per = ($request->onbook_paymenttype10per == "NEFT") ? $request->onbook_neftid10per : "-";

        $payments10per = round(($data->gross_amount * 40) / 100);
        $data->payments10per = $payments10per;
        $data->payments_received10per = $request->payments_received10per ? $request->payments_received10per : "0";
        $balance = $data->payments10per - $data->payments_received10per;
        $data->payments_balance10per = $balance;
        $data->payments_paymentdate10per = $request->payments_paymentdate10per ? $request->payments_paymentdate10per : "-";
        $data->payments_transactiontype10per = $request->payments_transactiontype10per ? $request->payments_transactiontype10per : "-";
        $data->payments_paymenttype10per = $request->payments_paymenttype10per ? $request->payments_paymenttype10per : "-";
        $data->payments_chequenumber10per = ($request->payments_paymenttype10per == "Cheque") ? $request->payments_chequenumber10per : "-";
        $data->payments_neftid10per = ($request->payments_paymenttype10per == "NEFT") ? $request->payments_neftid10per : "-";

        $first10per = round(($data->gross_amount * 10) / 100);
        $data->first10per = $first10per;
        $data->first_received10per = $request->first_received10per ? $request->first_received10per : "0";
        $balance = $data->first10per - $data->first_received10per;
        $data->first_balance10per = $balance;
        $data->first_paymentdate10per = $request->first_paymentdate10per ? $request->first_paymentdate10per : "-";
        $data->first_transactiontype10per = $request->first_transactiontype10per ? $request->first_transactiontype10per : "-";
        $data->first_paymenttype10per = $request->first_paymenttype10per ? $request->first_paymenttype10per : "-";
        $data->first_chequenumber10per = ($request->first_paymenttype10per == "Cheque") ? $request->first_chequenumber10per : "-";
        $data->first_neftid10per = ($request->first_paymenttype10per == "NEFT") ? $request->first_neftid10per : "-";

        $second10per = round(($data->gross_amount * 10) / 100);
        $data->second10per = $second10per;
        $data->second_received10per = $request->second_received10per ? $request->second_received10per : "0";
        $balance = $data->second10per - $data->second_received10per;
        $data->second_balance10per = $balance;
        $data->second_paymentdate10per = $request->second_paymentdate10per ? $request->second_paymentdate10per : "-";
        $data->second_transactiontype10per = $request->second_transactiontype10per ? $request->second_transactiontype10per : "-";
        $data->second_paymenttype10per = $request->second_paymenttype10per ? $request->second_paymenttype10per : "-";
        $data->second_chequenumber10per = ($request->second_paymenttype10per == "Cheque") ? $request->second_chequenumber10per : "-";
        $data->second_neftid10per = ($request->second_paymenttype10per == "NEFT") ? $request->second_neftid10per : "-";

        $third10per = round(($data->gross_amount * 10) / 100);
        $data->third10per = $third10per;
        $data->third_received10per = $request->third_received10per ? $request->third_received10per : "0";
        $balance = $data->third10per - $data->third_received10per;
        $data->third_balance10per = $balance;
        $data->third_paymentdate10per = $request->third_paymentdate10per ? $request->third_paymentdate10per : "-";
        $data->third_transactiontype10per = $request->third_transactiontype10per ? $request->third_transactiontype10per : "-";
        $data->third_paymenttype10per = $request->third_paymenttype10per ? $request->third_paymenttype10per : "-";
        $data->third_chequenumber10per = ($request->third_paymenttype10per == "Cheque") ? $request->third_chequenumber10per : "-";
        $data->third_neftid10per = ($request->third_paymenttype10per == "NEFT") ? $request->third_neftid10per : "-";

        $fourth10per = round(($data->gross_amount * 10) / 100);
        $data->fourth10per = $fourth10per;
        $data->fourth_received10per = $request->fourth_received10per ? $request->fourth_received10per : "0";
        $balance = $data->fourth10per - $data->fourth_received10per;
        $data->fourth_balance10per = $balance;
        $data->fourth_paymentdate10per = $request->fourth_paymentdate10per ? $request->fourth_paymentdate10per : "-";
        $data->fourth_transactiontype10per = $request->fourth_transactiontype10per ? $request->fourth_transactiontype10per : "-";
        $data->fourth_paymenttype10per = $request->fourth_paymenttype10per ? $request->fourth_paymenttype10per : "-";
        $data->fourth_chequenumber10per = ($request->fourth_paymenttype10per == "Cheque") ? $request->fourth_chequenumber10per : "-";
        $data->fourth_neftid10per = ($request->fourth_paymenttype10per == "NEFT") ? $request->fourth_neftid10per : "-";

        $fifth10per = round(($data->gross_amount * 5) / 100);
        $data->fifth10per = $fifth10per;
        $data->fifth_received10per = $request->fifth_received10per ? $request->fifth_received10per : "0";
        $balance = $data->fifth10per - $data->fifth_received10per;
        $data->fifth_balance10per = $balance;
        $data->fifth_paymentdate10per = $request->fifth_paymentdate10per ? $request->fifth_paymentdate10per : "-";
        $data->fifth_transactiontype10per = $request->fifth_transactiontype10per ? $request->fifth_transactiontype10per : "-";
        $data->fifth_paymenttype10per = $request->fifth_paymenttype10per ? $request->fifth_paymenttype10per : "-";
        $data->fifth_chequenumber10per = ($request->fifth_paymenttype10per == "Cheque") ? $request->fifth_chequenumber10per : "-";
        $data->fifth_neftid10per = ($request->fifth_paymenttype10per == "NEFT") ? $request->fifth_neftid10per : "-";

        $handover10per = round(($data->gross_amount * 5) / 100);
        $data->handover10per = $handover10per;
        $data->handover_received10per = $request->handover_received10per ? $request->handover_received10per : "0";
        $balance = $data->handover10per - $data->handover_received10per;
        $data->handover_balance10per = $balance;
        $data->handover_paymentdate10per = $request->handover_paymentdate10per ? $request->handover_paymentdate10per : "-";
        $data->handover_transactiontype10per = $request->handover_transactiontype10per ? $request->handover_transactiontype10per : "-";
        $data->handover_paymenttype10per = $request->handover_paymenttype10per ? $request->handover_paymenttype10per : "-";
        $data->handover_chequenumber10per = ($request->handover_paymenttype10per == "Cheque") ? $request->handover_chequenumber10per : "-";
        $data->handover_neftid10per = ($request->handover_paymenttype10per == "NEFT") ? $request->handover_neftid10per : "-";

        $onbook15per = round(($data->gross_amount * 15) / 100);
        $data->onbook15per = $onbook15per;
        $data->onbook_received15per = $request->onbook_received15per ? $request->onbook_received15per : "0";
        $balance = $data->onbook15per - $data->onbook_received15per;
        $data->onbook_balance15per = $balance;
        $data->onbook_paymentdate15per = $request->onbook_paymentdate15per ? $request->onbook_paymentdate15per : "-";
        $data->onbook_transactiontype15per = $request->onbook_transactiontype15per ? $request->onbook_transactiontype15per : "-";
        $data->onbook_paymenttype15per = $request->onbook_paymenttype15per ? $request->onbook_transactiontype15per : "-";
        $data->onbook_chequenumber15per = ($request->onbook_paymenttype15per == "Cheque") ? $request->onbook_chequenumber15per : "-";
        $data->onbook_neftid15per = ($request->onbook_paymenttype15per == "NEFT") ? $request->onbook_neftid15per : "-";

        $payments15per = round(($data->gross_amount * 40) / 100);
        $data->payments15per = $payments15per;
        $data->payments_received15per = $request->payments_received15per ? $request->payments_received15per : "0";
        $balance = $data->payments15per - $data->payments_received15per;
        $data->payments_balance15per = $balance;
        $data->payments_paymentdate15per = $request->payments_paymentdate15per ? $request->payments_paymentdate15per : "-";
        $data->payments_transactiontype15per = $request->payments_transactiontype15per ? $request->payments_transactiontype15per : "-";
        $data->payments_paymenttype15per = $request->payments_paymenttype15per ? $request->payments_paymenttype15per : "-";
        $data->payments_chequenumber15per = ($request->payments_paymenttype15per == "Cheque") ? $request->payments_chequenumber15per : "-";
        $data->payments_neftid15per = ($request->payments_paymenttype15per == "NEFT") ? $request->payments_neftid15per : "-";

        $first15per = round(($data->gross_amount * 10) / 100);
        $data->first15per = $first15per;
        $data->first_received15per = $request->first_received15per ? $request->first_received15per : "0";
        $balance = $data->first15per - $data->first_received15per;
        $data->first_balance15per = $balance;
        $data->first_paymentdate15per = $request->first_paymentdate15per ? $request->first_paymentdate15per : "-";
        $data->first_transactiontype15per = $request->first_transactiontype15per ? $request->first_transactiontype15per : "-";
        $data->first_paymenttype15per = $request->first_paymenttype15per ? $request->first_paymenttype15per : "-";
        $data->first_chequenumber15per = ($request->first_paymenttype15per == "Cheque") ? $request->first_chequenumber15per : "-";
        $data->first_neftid15per = ($request->first_paymenttype15per == "NEFT") ? $request->first_neftid15per : "-";

        $second15per = round(($data->gross_amount * 10) / 100);
        $data->second15per = $second15per;
        $data->second_received15per = $request->second_received15per ? $request->second_received15per : "0";
        $balance = $data->second15per - $data->second_received15per;
        $data->second_balance15per = $balance;
        $data->second_paymentdate15per = $request->second_paymentdate15per ? $request->second_paymentdate15per : "-";
        $data->second_transactiontype15per = $request->second_transactiontype15per ? $request->second_transactiontype15per : "-";
        $data->second_paymenttype15per = $request->second_paymenttype15per ? $request->second_paymenttype15per : "-";
        $data->second_chequenumber15per = ($request->second_paymenttype15per == "Cheque") ? $request->second_chequenumber15per : "-";
        $data->second_neftid15per = ($request->second_paymenttype15per == "NEFT") ? $request->second_neftid15per : "-";

        $third15per = round(($data->gross_amount * 10) / 100);
        $data->third15per = $third15per;
        $data->third_received15per = $request->third_received15per ? $request->third_received15per : "0";
        $balance = $data->third15per - $data->third_received15per;
        $data->third_balance15per = $balance;
        $data->third_paymentdate15per = $request->third_paymentdate15per ? $request->third_paymentdate15per : "-";
        $data->third_transactiontype15per = $request->third_transactiontype15per ? $request->third_transactiontype15per : "-";
        $data->third_paymenttype15per = $request->third_paymenttype15per ? $request->third_paymenttype15per : "-";
        $data->third_chequenumber15per = ($request->third_paymenttype15per == "Cheque") ? $request->third_chequenumber15per : "-";
        $data->third_neftid15per = ($request->third_paymenttype15per == "NEFT") ? $request->third_neftid15per : "-";

        $fourth15per = round(($data->gross_amount * 5) / 100);
        $data->fourth15per = $fourth15per;
        $data->fourth_received15per = $request->fourth_received15per ? $request->fourth_received15per : "0";
        $balance = $data->fourth15per - $data->fourth_received15per;
        $data->fourth_balance15per = $balance;
        $data->fourth_paymentdate15per = $request->fourth_paymentdate15per ? $request->fourth_paymentdate15per : "-";
        $data->fourth_transactiontype15per = $request->fourth_transactiontype15per ? $request->fourth_transactiontype15per : "-";
        $data->fourth_paymenttype15per = $request->fourth_paymenttype15per ? $request->fourth_paymenttype15per : "-";
        $data->fourth_chequenumber15per = ($request->fourth_paymenttype15per == "Cheque") ? $request->fourth_chequenumber15per : "-";
        $data->fourth_neftid15per = ($request->fourth_paymenttype15per == "NEFT") ? $request->fourth_neftid15per : "-";

        $fifth15per = round(($data->gross_amount * 5) / 100);
        $data->fifth15per = $fifth15per;
        $data->fifth_received15per = $request->fifth_received15per ? $request->fifth_received15per : "0";
        $balance = $data->fifth15per - $data->fifth_received15per;
        $data->fifth_balance15per = $balance;
        $data->fifth_paymentdate15per = $request->fifth_paymentdate15per ? $request->fifth_paymentdate15per : "-";
        $data->fifth_transactiontype15per = $request->fifth_transactiontype15per ? $request->fifth_transactiontype15per : "-";
        $data->fifth_paymenttype15per = $request->fifth_paymenttype15per ? $request->fifth_paymenttype15per : "-";
        $data->fifth_chequenumber15per = ($request->fifth_paymenttype15per == "Cheque") ? $request->fifth_chequenumber15per : "-";
        $data->fifth_neftid15per = ($request->fifth_paymenttype15per == "NEFT") ? $request->fifth_neftid15per : "-";

        $handover15per = round(($data->gross_amount * 5) / 100);
        $data->handover15per = $handover15per;
        $data->handover_received15per = $request->handover_received15per ? $request->handover_received15per : "0";
        $balance = $data->handover15per - $data->handover_received15per;
        $data->handover_balance15per = $balance;
        $data->handover_paymentdate15per = $request->handover_paymentdate15per ? $request->handover_paymentdate15per : "-";
        $data->handover_transactiontype15per = $request->handover_transactiontype15per ? $request->handover_transactiontype15per : "-";
        $data->handover_paymenttype15per = $request->handover_paymenttype15per ? $request->handover_paymenttype15per : "-";
        $data->handover_chequenumber15per = ($request->handover_paymenttype15per == "Cheque") ? $request->handover_chequenumber15per : "-";
        $data->handover_neftid15per = ($request->handover_paymenttype15per == "NEFT") ? $request->handover_neftid15per : "-";

        $onbook20per = round(($data->gross_amount * 20) / 100);
        $data->onbook20per = $onbook20per;
        $data->onbook_received20per = $request->onbook_received20per ? $request->onbook_received20per : "0";
        $balance = $data->onbook20per - $data->onbook_received20per;
        $data->onbook_balance20per = $balance;
        $data->onbook_paymentdate20per = $request->onbook_paymentdate20per ? $request->onbook_paymentdate20per : "-";
        $data->onbook_transactiontype20per = $request->onbook_transactiontype20per ? $request->onbook_transactiontype20per : "-";
        $data->onbook_paymenttype20per = $request->onbook_paymenttype20per ? $request->onbook_transactiontype20per : "-";
        $data->onbook_chequenumber20per = ($request->onbook_paymenttype20per == "Cheque") ? $request->onbook_chequenumber20per : "-";
        $data->onbook_neftid20per = ($request->onbook_paymenttype20per == "NEFT") ? $request->onbook_neftid20per : "-";

        $payments20per = round(($data->gross_amount * 40) / 100);
        $data->payments20per = $payments20per;
        $data->payments_received20per = $request->payments_received20per ? $request->payments_received20per : "0";
        $balance = $data->payments20per - $data->payments_received20per;
        $data->payments_balance20per = $balance;
        $data->payments_paymentdate20per = $request->payments_paymentdate20per ? $request->payments_paymentdate20per : "-";
        $data->payments_transactiontype20per = $request->payments_transactiontype20per ? $request->payments_transactiontype20per : "-";
        $data->payments_paymenttype20per = $request->payments_paymenttype20per ? $request->payments_paymenttype20per : "-";
        $data->payments_chequenumber20per = ($request->payments_paymenttype20per == "Cheque") ? $request->payments_chequenumber20per : "-";
        $data->payments_neftid20per = ($request->payments_paymenttype20per == "NEFT") ? $request->payments_neftid20per : "-";

        $first20per = round(($data->gross_amount * 10) / 100);
        $data->first20per = $first20per;
        $data->first_received20per = $request->first_received20per ? $request->first_received20per : "0";
        $balance = $data->first20per - $data->first_received20per;
        $data->first_balance20per = $balance;
        $data->first_paymentdate20per = $request->first_paymentdate20per ? $request->first_paymentdate20per : "-";
        $data->first_transactiontype20per = $request->first_transactiontype20per ? $request->first_transactiontype20per : "-";
        $data->first_paymenttype20per = $request->first_paymenttype20per ? $request->first_paymenttype20per : "-";
        $data->first_chequenumber20per = ($request->first_paymenttype20per == "Cheque") ? $request->first_chequenumber20per : "-";
        $data->first_neftid20per = ($request->first_paymenttype20per == "NEFT") ? $request->first_neftid20per : "-";

        $second20per = round(($data->gross_amount * 10) / 100);
        $data->second20per = $second20per;
        $data->second_received20per = $request->second_received20per ? $request->second_received20per : "0";
        $balance = $data->second20per - $data->second_received20per;
        $data->second_balance20per = $balance;
        $data->second_paymentdate20per = $request->second_paymentdate20per ? $request->second_paymentdate20per : "-";
        $data->second_transactiontype20per = $request->second_transactiontype20per ? $request->second_transactiontype20per : "-";
        $data->second_paymenttype20per = $request->second_paymenttype20per ? $request->second_paymenttype20per : "-";
        $data->second_chequenumber20per = ($request->second_paymenttype20per == "Cheque") ? $request->second_chequenumber20per : "-";
        $data->second_neftid20per = ($request->second_paymenttype20per == "NEFT") ? $request->second_neftid20per : "-";

        $third20per = round(($data->gross_amount * 5) / 100);
        $data->third20per = $third20per;
        $data->third_received20per = $request->third_received20per ? $request->third_received20per : "0";
        $balance = $data->third20per - $data->third_received20per;
        $data->third_balance20per = $balance;
        $data->third_paymentdate20per = $request->third_paymentdate20per ? $request->third_paymentdate20per : "-";
        $data->third_transactiontype20per = $request->third_transactiontype20per ? $request->third_transactiontype20per : "-";
        $data->third_paymenttype20per = $request->third_paymenttype20per ? $request->third_paymenttype20per : "-";
        $data->third_chequenumber20per = ($request->third_paymenttype20per == "Cheque") ? $request->third_chequenumber20per : "-";
        $data->third_neftid20per = ($request->third_paymenttype20per == "NEFT") ? $request->third_neftid20per : "-";

        $fourth20per = round(($data->gross_amount * 5) / 100);
        $data->fourth20per = $fourth20per;
        $data->fourth_received20per = $request->fourth_received20per ? $request->fourth_received20per : "0";
        $balance = $data->fourth20per - $data->fourth_received20per;
        $data->fourth_balance20per = $balance;
        $data->fourth_paymentdate20per = $request->fourth_paymentdate20per ? $request->fourth_paymentdate20per : "-";
        $data->fourth_transactiontype20per = $request->fourth_transactiontype20per ? $request->fourth_transactiontype20per : "-";
        $data->fourth_paymenttype20per = $request->fourth_paymenttype20per ? $request->fourth_paymenttype20per : "-";
        $data->fourth_chequenumber20per = ($request->fourth_paymenttype20per == "Cheque") ? $request->fourth_chequenumber20per : "-";
        $data->fourth_neftid20per = ($request->fourth_paymenttype20per == "NEFT") ? $request->fourth_neftid20per : "-";

        $fifth20per = round(($data->gross_amount * 5) / 100);
        $data->fifth20per = $fifth20per;
        $data->fifth_received20per = $request->fifth_received20per ? $request->fifth_received20per : "0";
        $balance = $data->fifth20per - $data->fifth_received20per;
        $data->fifth_balance20per = $balance;
        $data->fifth_paymentdate20per = $request->fifth_paymentdate20per ? $request->fifth_paymentdate20per : "-";
        $data->fifth_transactiontype20per = $request->fifth_transactiontype20per ? $request->fifth_transactiontype20per : "-";
        $data->fifth_paymenttype20per = $request->fifth_paymenttype20per ? $request->fifth_paymenttype20per : "-";
        $data->fifth_chequenumber20per = ($request->fifth_paymenttype20per == "Cheque") ? $request->fifth_chequenumber20per : "-";
        $data->fifth_neftid20per = ($request->fifth_paymenttype20per == "NEFT") ? $request->fifth_neftid20per : "-";

        $handover20per = round(($data->gross_amount * 5) / 100);
        $data->handover20per = $handover20per;
        $data->handover_received20per = $request->handover_received20per ? $request->handover_received20per : "0";
        $balance = $data->handover20per - $data->handover_received20per;
        $data->handover_balance20per = $balance;
        $data->handover_paymentdate20per = $request->handover_paymentdate20per ? $request->handover_paymentdate20per : "-";
        $data->handover_transactiontype20per = $request->handover_transactiontype20per ? $request->handover_transactiontype20per : "-";
        $data->handover_paymenttype20per = $request->handover_paymenttype20per ? $request->handover_paymenttype20per : "-";
        $data->handover_chequenumber20per = ($request->handover_paymenttype20per == "Cheque") ? $request->handover_chequenumber20per : "-";
        $data->handover_neftid20per = ($request->handover_paymenttype20per == "NEFT") ? $request->handover_neftid20per : "-";

        $data->created_date = date('Y-m-d H:i:s');
        $data->save();
        Session::flash('message', 'Payment Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('payments.index', []);
    }
    public function edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Payment::where('payment_id', '=', $id)->first();
        return view('payments/edit', ['detail' => $detail]);
    }
    public function update(Request $request)
    {

        $check = $this->validate($request, [
           
        ]);
        $data = new Payment();
       
        $data->save();
        Session::flash('message', 'Payment Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('payments.index', []);
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
