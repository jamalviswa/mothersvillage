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
class CardsController extends Controller {
    
    public function index() {       
        $sessionadmin = Parent::checkadmin();        
        return view('/cards/index');        
    }
    public function add() {
        $sessionadmin = Parent::checkadmin();
        return view('/cards/add', []);
    }
}
