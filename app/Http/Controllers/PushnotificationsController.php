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
class PushnotificationsController extends Controller {
    
    public function index() {       
        $sessionadmin = Parent::checkadmin();        
        return view('/pushnotifications/index');        
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/pushnotifications/add', []);
    }
}
