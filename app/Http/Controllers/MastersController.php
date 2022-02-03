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
use App\Block;

class MastersController extends Controller
{

    //Phase Details index function

    public function phase_index()
    {
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

    public function phase_add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('masters/phase_add', []);
    }
    public function phase_store(Request $request)
    {
        $sessionadmin = Parent::checkadmin();
        $check = $this->validate($request, [
            'phase_name' => ['required', Rule::unique('phases')->where(function ($query) use ($request) {
                return $query->where('phase_name', $request->phase_name)->where('status', '<>', 'Trash');
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

    //Phase Details edit function

    public function phase_edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Phase::where('phase_id', '=', $id)->first();
        return view('masters/phase_edit', ['detail' => $detail]);
    }
    public function phase_update(Request $request, $id = null)
    {
        $check = $this->validate($request, [
            'phase_name' => ['required', Rule::unique('phases')->where(function ($query) use ($request, $id) {
                return $query->where('phase_name', $request->phase_name)->where('phase_id', '<>', $id)->where('status', '<>', 'Trash');
            })],
        ]);
        $data = Phase::findOrFail($id);
        $data->phase_name = $request->phase_name;
        $data->modified_date = date('Y-m-d H:i:s');
        $data->save();
        Session::flash('message', 'Phase Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('masters.phase_index', []);
    }

    //Block Details index function

    public function block_index()
    {
        $sessionadmin = Parent::checkadmin();
        $result = Block::where('status', '<>', 'Trash')->orderBy('block_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $result->where(function ($query) use ($s) {
                $query->where('block_name', 'LIKE', "%$s%");
            });
        }
        if (!empty($_REQUEST['phase'])) {
            $phase = $_REQUEST['phase'];
            $result->where(function ($query) use ($phase) {
                $query->where('phase_id', 'LIKE', "%$phase%");
            });
        }
        $result = $result->paginate(10);
        return view('/masters/block_index', [
            'results' => $result
        ]);
    }

    //Block Details add function

    public function block_add()
    {
        $sessionadmin = Parent::checkadmin();
        return view('masters/block_add', []);
    }
    public function block_store(Request $request)
    {
        $sessionadmin = Parent::checkadmin();
        $check = $this->validate($request, [
            'phase' => ['required'],
            'block_name' => ['required', Rule::unique('blocks')->where(function ($query) use ($request) {
                return $query->where('block_name', $request->block_name)->where('status', '<>', 'Trash');
            })],
        ]);
        $data = new Block();
        $data->phase_id = $request->phase;
        $data->block_name = $request->block_name;
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = "Active";
        $data->save();
        Session::flash('message', 'Block Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('masters.block_index', []);
    }

    //Phase Details edit function

    public function block_edit($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = Block::where('block_id', '=', $id)->first();
        return view('masters/block_edit', ['detail' => $detail]);
    }
    public function block_update(Request $request, $id = null)
    {
        $check = $this->validate($request, [
            'phase' => ['required'],
            'block_name' => ['required', Rule::unique('blocks')->where(function ($query) use ($request, $id) {
                return $query->where('block_name', $request->block_name)->where('block_id', '<>', $id)->where('status', '<>', 'Trash');
            })],
        ]);
        $data = Block::findOrFail($id);
        $data->phase_id = $request->phase;
        $data->block_name = $request->block_name;
        $data->modified_date = date('Y-m-d H:i:s');
        $data->save();
        Session::flash('message', 'Block Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('masters.block_index', []);
    }
}
