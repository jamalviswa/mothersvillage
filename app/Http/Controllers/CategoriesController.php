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
use App\Category;
class CategoriesController extends Controller {
    
    public function index() {
       
        $sessionadmin = Parent::checkadmin();
        $result = Category::where('status', '<>', 'Trash')
                        ->orderBy('category_id', 'desc');
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
        
        return view('/categories/index', [
            'results' => $result
        ]);
        
        
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('categories/add', []);
    }
    public function store(Request $request)
    {
        // dd($request->all());
           $check= $this->validate($request, [
            'description' => ['required'],
            'name' => ['required',Rule::unique('categories')->where(function ($query) use($request) {
                return $query->where('name', $request->name)->where('status','<>', 'Trash');
            })],
            'status' => ['required'],
        ]);
        $data = new Category();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->created_date = date('Y-m-d H:i:s');
        $data->status = $request->status; 
        $data->save();
         Session::flash('message', 'Category Added!');
                Session::flash('alert-class', 'success');
        return \Redirect::route('categories.index', []);
        
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
