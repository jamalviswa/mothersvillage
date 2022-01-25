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
use Redirect;
use App\User;
use App\Emailcontent;
use App\Userreport;
use App\Appcontact;
use App\City;
use App\Country;
use App\Agentdetail;
use App\Sproviderdetail;
use App\Subject_provider;
use App\WalletHistory;
use App\State;
class UsersController extends Controller {
    public function index() {
       
        $sessionadmin = Parent::checkadmin();
        $users = User::where('status', '<>', 'Trash')
                        ->orderBy('user_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];   
            $users->where(function ($query) use ($s) {
                $query->where('name', 'LIKE', "%$s%")
                    ->orWhere('email', 'LIKE', "%$s%");  
            });              
        } 
        $users = $users->paginate(10);
        return view('/users/index', [
            'users' => $users
        ]);
        
    }
     public function updateStatus(Request $request)
    {
    		// dd($request->all());
            $data = User::findOrFail($request->user_id);
            $data->status = $request->status;
            $data->save();
            Session::flash('message', 'Status Updated Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
    public function parents() {
        $sessionadmin = Parent::checkadmin();
        $parents = User::where('user_type', 'parent')
                        ->where('status', '<>', 'Trash')
                        ->orderBy('user_id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];   
            $parents->where(function ($query) use ($s) {
                $query->where('first_name', 'LIKE', "%$s%")
                    ->orWhere('email', 'LIKE', "%$s%")
                    ->orWhere('mobile', 'LIKE', "%$s%");    
            });              
        }   
        $parents = $parents->paginate(10);
        return view('users/parents', [
            'parents' => $parents
        ]);
    }
    public function studentview($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = User::where('user_id', '=', $id)->first();
        $results=WalletHistory::where('user_id',$id);
         $results = $results->paginate(10);
        return view('users/studentview', ['detail' => $detail,'results'=>$results]);
    }
    public function parentview($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = User::where('user_id', '=', $id)->first();
        return view('users/parentview', ['detail' => $detail]);
    }
    public function agents() {
        $sessionadmin = Parent::checkadmin();
        $agents = User::join('agentdetails', 'users.user_id', '=', 'agentdetails.agent_id')
                        ->where('users.user_type', 'Agent')
                        ->where('users.status', '<>', 'Trash')
                        ->orderBy('users.user_id', 'desc')
                        ->select('users.*','agentdetails.*','users.status as status');
        if (!empty($_REQUEST['s']) && isset($_REQUEST)) {
            $s = $_REQUEST['s'];              
            $agents->where(function ($query) use ($s) {
                $query->where('users.first_name', 'LIKE', "%$s%")
                    ->orWhere('users.email', 'LIKE', "%$s%")
                     ->orWhere('agentdetails.agent_code', 'LIKE', "%$s%");   
            });              
        } 
        // if (!empty( $_REQUEST['category'])) { 
        //     $category = $_REQUEST['category'];  
        //     $service = $_REQUEST['service'];              
        //     $agents->where(function ($query) use ($category) {
        //         $query->where('agentdetails.category_id', 'LIKE', "%$category%");   
        //     });              
        // } 
        // if (!empty( $_REQUEST['service'])) {  
        //     $service = $_REQUEST['service'];              
        //     $agents->where(function ($query) use ($service) {
        //         $query->where('agentdetails.service_id', 'LIKE', "%$service%");   
        //     });              
        // } 
        $agents = $agents->paginate(10);
        return view('users/agents', [
            'agents' => $agents
        ]);
    }
    public function addagent() {
        $sessionadmin = Parent::checkadmin();
        return view('users/addagent', []);
    }
    public function store_agent(Request $request)
    {
        if ($request->has('submit')) {
          
            $check= $this->validate($request, [
                'first_name' => ['required'],
                'agent_type'=> ['required'],
                 
             ]);
             if(!empty($request->email)){
                  $check= $this->validate($request, [
                'email' => [Rule::unique('users')->where(function ($query) use($request) {
                     return $query->where('email', $request->email)->where('status','<>', 'Trash');
                 })],
             ]);
             }
        $checkinc=User::where('status','Active')->where('user_type','Agent')->orderBy('user_id', 'desc')->first();
        $inc=$checkinc->agent_inc + 1;
        $pwd=Str::random(8);
        $data = new User();
        $data->token = Str::random(8);
        $data->user_type ='Agent';
        
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
       
        $data->email =!empty($request->email) ? $request->email : "";
        $data->password = md5($pwd);
        $data->gender = !empty($request->gender) ? $request->gender : "";
        $data->dob = "" ;
        $data->mobile = !empty($request->mobile) ? $request->mobile : "";            
        $data->address = !empty($request->address) ? $request->address : "";
        $data->profile = "";
        if(!empty($request->file('idproof'))) { 
        $idproof = $request->file('idproof');
            $imagename = uniqid() . '.' . $idproof->getClientOriginalExtension();
            $destinationPath = public_path('/files/proof/');
            $chck= $idproof->move($destinationPath, $imagename);
            $data->idproof = $imagename;
        } else {
            $data->idproof = '';
        }
        $data->agent_inc = $inc;
        
        $data->datetime = date('Y-m-d H:i:s');
        $data->status = "Active";            
        $data->save();
        
        $code= sprintf('%04d', $inc);         
        $agent_code= "AG". $code;
        
        $id = $data->user_id;
        $agentdetail = new Agentdetail();
        $agentdetail->agent_id = $id;
        $agentdetail->agent_code = $agent_code;
        $agentdetail->agent_type = $request->agent_type;
        $agentdetail->director_name = !empty($request->director_name) ? $request->director_name : "";
        $agentdetail->incharge_name = !empty($request->incharge_name) ? $request->incharge_name : "";
        $agentdetail->line_no = !empty($request->line_no) ? $request->line_no : "";
        $agentdetail->whatsapp_no = !empty($request->whatsapp_no) ? $request->whatsapp_no : "";
        $agentdetail->we_chat = !empty($request->we_chat) ? $request->we_chat : "";
        $agentdetail->kakao_talk = !empty($request->kakao_talk) ? $request->kakao_talk : "";
        $agentdetail->agent_fee = !empty($request->agent_fee) ? $request->agent_fee : "";
        $agentdetail->commission = !empty($request->commission) ? $request->commission : "";
        $agentdetail->datetime = date('Y-m-d H:i:s');
        $agentdetail->save();
        
        // $emailcontent = Emailcontent::where('id', '1')->first();
        // if (!empty($emailcontent) && !empty($data->email)) {
        //     $message = str_replace(array('{name}','{email}','{service}','{password}'), array($data->first_name,$data->email,$data->service,$pwd), $emailcontent->emailcontent);
        //     $mail = Parent::sendmail($message, $emailcontent->subject, $emailcontent->from_email, $emailcontent->from_name, $data->email,'');
        // dd($mail);
        // } 
        Session::flash('message', 'Agent Registered Sucessfully!');
        Session::flash('alert-class', 'success');
            return \Redirect::route('admin.users.agents', []);
        }
    }
    public function editagent($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = User::join('agentdetails', 'users.user_id', '=', 'agentdetails.agent_id')
                            ->where('users.user_id', '=', $id)
                            ->select('users.*','agentdetails.*','users.status as status')->first();
        return view('users/editagent', ['detail' => $detail]);
    }
    public function update(Request $request, $id = null)
    {
        if ($request->has('submit')) {
            
            $check= $this->validate($request, [
               'first_name' => ['required'],
                'agent_type'=> ['required']
                 
             ]);
       if(!empty($request->email)){
                  $check= $this->validate($request, [
                'email' => [Rule::unique('users')->where(function ($query) use($request) {
                     return $query->where('email', $request->email)->where('status','<>', 'Trash');
                 })],
             ]);
             }
        $data = User::findOrFail($id);
       
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = !empty($request->email) ? $request->email : "";
        $data->gender = !empty($request->gender) ? $request->gender : $data->gender;
        $data->dob = "" ;       
        $data->address = !empty($request->address) ? $request->address : $data->address;
        $data->profile = "";
        if(!empty($request->file('idproof'))) { 
        $idproof = $request->file('idproof');
            $imagename = uniqid() . '.' . $idproof->getClientOriginalExtension();
            $destinationPath = public_path('/files/proof/');
            $chck= $idproof->move($destinationPath, $imagename);
            $data->idproof = $imagename;
        } else {
            $data->idproof = $data->idproof;
        }      
        $data->save();
        
        $agentdetail = Agentdetail::where('agent_id', '=', $id)->first();
        $agentdetail->agent_id = $id;
        $agentdetail->agent_type = $request->agent_type;
        $agentdetail->director_name =$request->director_name;
        $agentdetail->incharge_name =$request->incharge_name;
        $agentdetail->line_no =$request->line_no;
        $agentdetail->whatsapp_no =$request->whatsapp_no;
        $agentdetail->kakao_talk =$request->kakao_talk;
        $agentdetail->we_chat =$request->we_chat;
        $agentdetail->agent_fee = !empty($request->agent_fee) ? $request->agent_fee :  $agentdetail->agent_fee;
        $agentdetail->commission = !empty($request->commission) ? $request->commission : $agentdetail->commission;
        $agentdetail->save();
         
            Session::flash('message', 'Agent Updated Sucessfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('admin.users.agents', []);
        }
    }
       public function updateagentpopup(Request $request) {
           
        if (!empty($request->id)) {
            
            $agent = User::where('user_id', $request->id)->where('status', 'Active')->first();
            return view('users.updateagentpopup', ['agent' => $agent]);
        }
    }
      public function getagentdetails(Request $request) {
           
        if (!empty($request->id)) {
            
            $agent = User::where('user_id', $request->id)->where('status', 'Active')->first();
            return  $agent;
        }
    }
     public function updateagentlogin() {
       if ($_POST["agent-id"]) {
            if (!$_POST["password"]) {
                return json_encode([
                    "success" => false,
                    "message" => 'Enter Agent Password!',
                ]);
            }
            $user = User::findOrFail($_POST["agent-id"]);
            $user->agent_user_name = $_POST["username"];
            $user->password = md5($_POST["password"]);
            $user->save();
            
            $emailcontent = Emailcontent::where('id', '3')->first();
         if (!empty($emailcontent) && !empty($user->email)) {
             $link=url('/agent');
            $message = str_replace(array('{name}','{username}','{password}','{link}'), array( $user->first_name, $_POST["username"] ,$_POST["password"],$link), $emailcontent->emailcontent);
             $mail = Parent::sendmail($message, $emailcontent->subject, $emailcontent->from_email, $emailcontent->from_name, $user->email,'');
         }
            
            Session::flash('message', 'Login Updated Successfully!');
            Session::flash('alert-class', 'success');
                return \Redirect::route('admin.users.agents', []);
//            return json_encode([
//                "success" => true,
//            ]);
        } else {
        return json_encode([
            "success" => false,
        ]);
        }
    }
    
     public function sproviders() {
        $sessionadmin = Parent::checkadmin();
        $sproviders = User::join('sproviderdetails', 'users.user_id', '=', 'sproviderdetails.user_id')
                        ->where('users.user_type', 'Service Provider')
                        ->where('users.status', '<>', 'Trash')
                        ->orderBy('users.user_id', 'desc')
                        ->groupBy('users.user_id')
                        ->select('users.*','sproviderdetails.*','users.status as status');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];              
            $sproviders->where(function ($query) use ($s) {
                $query->where('users.first_name', 'LIKE', "%$s%")
                    ->orWhere('users.email', 'LIKE', "%$s%")
                ->orWhere('sproviderdetails.company_name', 'LIKE', "%$s%");   
            });              
        } 
        if (!empty( $_REQUEST['category'])) { 
            $category = $_REQUEST['category'];  
            /*$service = $_REQUEST['service'];              */
            $sproviders->where(function ($query) use ($category) {
                $query->where('sproviderdetails.category_id', 'LIKE', "%$category%");   
            });              
        } 
        /*if (!empty( $_REQUEST['service'])) {  
            $service = $_REQUEST['service'];              
            $sproviders->where(function ($query) use ($service) {
                $query->where('sproviderdetails.service_id', 'LIKE', "%$service%");   
            });              
        }*/ 
        $sproviders = $sproviders->paginate(10);
        // dd($sproviders);
        return view('users/sproviders', [
            'sproviders' => $sproviders
        ]);
    }
    public function addsprovider() {
        
        $sessionadmin = Parent::checkadmin();
        return view('users/addsprovider', []);
    }
    public function store_sprovider(Request $request)
    {
        // dd($request->all());
          
        $check= $this->validate($request, [
            'category' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'mobile' => ['required'],
            // 'company_name' => ['required'],
            'address' => ['required'],
            'profile' => ['required'],
            'idproof' => ['required'],
            
              'email' => ['required','email','regex:/^\S*$/u',
                 'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',Rule::unique('users')->where(function ($query) use($request) {
                     return $query->where('email', $request->email)->where('status','<>', 'Trash');
                 })],
            'mobile' => ['required','numeric', 'digits_between:1,15',
                 Rule::unique('users')->where(function ($query) use($request) {
                     return $query->where('mobile', $request->mobile)->where('status','<>', 'Trash');
                 })],
         ]);
        if(!empty($request->service)){
              foreach($request->service as $services){
                 $service=implode(',',$request->service);
              } 
         }else{
             $service="";
         }
        $pwd=Str::random(8);
        $data = new User();
        $data->token = Str::random(8);
        $data->user_type ='Service Provider';
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->password = md5($pwd);
        $data->gender = !empty($request->gender) ? $request->gender : "";         
        $data->dob = "" ;
        $data->mobile = !empty($request->mobile) ? $request->mobile : "";            
        $data->address = !empty($request->address) ? $request->address : "";
        $data->profile = "";
        $idproof = $request->file('idproof');
        $imagename = uniqid() . '.' . $idproof->getClientOriginalExtension();
        $destinationPath = public_path('/files/proof/');
        $chck= $idproof->move($destinationPath, $imagename);
        $data->idproof = $imagename;
        
          $profile = $request->file('profile');
        $imagename1 = uniqid() . '.' . $profile->getClientOriginalExtension();
        $destinationPath = public_path('/files/proof/');
        $chck= $profile->move($destinationPath, $imagename1);
        $data->profile = $imagename1;
        $data->datetime = date('Y-m-d H:i:s');
        $data->status = "Active";            
        $data->save();
        $id = $data->user_id;
        $sdetail = new Sproviderdetail();
        $sdetail->user_id = $id;
        $sdetail->category_id = $request->category;
        $sdetail->company_name = $request->company_name;
        $sdetail->services_id=$service;
        $sdetail->datetime = date('Y-m-d H:i:s');
        $sdetail->save();
        // $detail_id=$sdetail->id;
        // $service_id = $request->service;
        // foreach($service_id as $ser_key=>$ser_val){
        //     $subject_provider = new Subject_provider();
        //     $subject_provider->sprovider_details_id = $detail_id;
        //     $subject_provider->subject_id = $ser_val;
        //     $subject_provider->status = "Active";
        //     $subject_provider->save();
        // }
        // $emailcontent = Emailcontent::where('id', '1')->first();
        // if (!empty($emailcontent)) {
        //     $message = str_replace(array('{name}','{email}','{service}','{password}'), array($data->first_name,$data->email,$data->service,$pwd), $emailcontent->emailcontent);
        //     $mail = Parent::sendmail($message, $emailcontent->subject, $emailcontent->from_email, $emailcontent->from_name, $data->email,'');
        // dd($mail);
        // } 
       Session::flash('message', 'Sevice Provider Registered Sucessfully!');
       Session::flash('alert-class', 'success');
       return \Redirect::route('admin.users.sproviders', []);
                
    }
    public function editsprovider($id = null)
    {       
        $sessionadmin = Parent::checkadmin();
        $detail = User::join('sproviderdetails', 'users.user_id', '=', 'sproviderdetails.user_id')
                            ->where('users.user_id', '=', $id)
                            ->select('users.*','sproviderdetails.*','users.status as status')->first();
        return view('users/editsprovider', ['detail' => $detail]);
    }
    public function update_sprovider(Request $request, $id = null)
    {
        
        
           $check= $this->validate($request, [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'mobile' => ['required'],
                // 'company_name' => ['required'],
                'address' => ['required'],
                'category_id' => ['required'],
               
                'email' => ['required','email','regex:/^\S*$/u',
                     'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',Rule::unique('users')->where(function ($query) use($request, $id) {
                         return $query->where('email', $request->email)->where('user_id','<>',$id)->where('status','<>', 'Trash');
                     })],
                     'mobile' => ['required','numeric', 'digits_between:1,15',
                     Rule::unique('users')->where(function ($query) use($request, $id) {
                         return $query->where('mobile', $request->mobile)->where('user_id','<>',$id)->where('status','<>', 'Trash');
                     })],
             ]);
                if(!empty($request->service)){
              foreach($request->service as $services){
                 $service=implode(',',$request->service);
              } 
                }else{
                    $service="";
                }  
            $data = User::findOrFail($id);
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->gender = !empty($request->gender) ? $request->gender : ""; 
            $data->mobile = !empty($request->mobile) ? $request->mobile : "";            
            $data->address = !empty($request->address) ? $request->address : "";
            if (!empty($request->file('idproof'))) {
                $idproof = $request->file('idproof');
                $imagename = uniqid() . '.' . $idproof->getClientOriginalExtension();
                $destinationPath = public_path('/files/proof/');
                $idproof->move($destinationPath, $imagename);
                $data->idproof = $imagename;
            }
             if (!empty($request->file('profile'))) {
                $profile = $request->file('profile');
                $imagename1 = uniqid() . '.' . $profile->getClientOriginalExtension();
                $destinationPath = public_path('/files/proof/');
                $profile->move($destinationPath, $imagename1);
                $data->profile = $imagename1;
            }
            $data->save();
            
            $sdetail = Sproviderdetail::where('user_id', '=', $id)->first();
            // dd($sdetail);
            $sdetail->user_id = $id;
            $sdetail->category_id = $request->category_id;            
            $sdetail->company_name = $request->company_name;
            $sdetail->services_id=$service;
            $sdetail->datetime = date('Y-m-d H:i:s');
            $sdetail->save();
            $provider_id=$sdetail->id;
        //     $service_id = $request->service_id;
            
            
            
        //     // dd($sub_list);
        //     $subject_exist = Subject_provider::whereNotIn('subject_id', $service_id)->where('sprovider_details_id',$provider_id)->get();
        //     // dd($subject_exist);
        //     if(!empty($subject_exist)){
        //         foreach($subject_exist as $sub_key=>$sub_val){
                    
        //             $subject = Subject_provider::where('id', $sub_val['id'])->update(['status'=>'Inactive']);
            
        //         }
        //     }
        //     $subject_list = Subject_provider::where('sprovider_details_id',$provider_id)->where('status','Active')->get()->toArray();
        //   $subject_exits_id=array();
        //     foreach($subject_list as $list_val){
        //         $subject_exits_id[]=$list_val['subject_id'];
        //     }
        //     foreach($service_id as $service_value){
        //         if(!in_array($service_value,$subject_exits_id)){
        //             $subject_provider = new Subject_provider();
        //             $subject_provider->sprovider_details_id = $provider_id;
        //             $subject_provider->subject_id = $service_value;
        //             $subject_provider->status = "Active";
        //             $subject_provider->save();
        //         }
        //     }
            
       Session::flash('message', 'Sevice Provider details updated Sucessfully!');
       Session::flash('alert-class', 'success');
       return \Redirect::route('admin.users.sproviders', []);
    }
     public function sproviderview($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = User::join('sproviderdetails', 'users.user_id', '=', 'sproviderdetails.user_id')
                            ->where('users.user_id', '=', $id)
                            ->select('users.*','sproviderdetails.*','users.status as status')->first();
        return view('users/sproviderview', ['detail' => $detail]);
    }
    //  public function updateStatus(Request $request)
    // {
    //         $data = User::findOrFail($request->user_id);
    //         $data->status = $request->status;
    //         $data->save();
    //         Session::flash('message', 'Status Updated Sucessfully!');
    //         Session::flash('alert-class', 'success');
    //         return Redirect::back();
    // }
    public function agentview($id = null)
    {
        $sessionadmin = Parent::checkadmin();
        $detail = User::join('agentdetails', 'users.user_id', '=', 'agentdetails.agent_id')
                            ->where('users.user_id', '=', $id)
                            ->select('users.*','agentdetails.*','users.status as status')->first();
        return view('users/agentview', ['detail' => $detail]);
    }
    public function delete(Request $request, $id = null)
    {        
            $data = User::findOrFail($id);
            $data->status = 'Trash';
            $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
        public function addstudent() {
            $sessionadmin = Parent::checkadmin();
            return view('users/addstudent', []);
        }
        public function store_student(Request $request)
        {
            if ($request->has('submit')) {
              
                $this->validate($request, [
                    'first_name' => ['required'],
                    'last_name' => ['required'],
                    'mobile' => ['required'],
                    'gender' => ['required'],
                    'country' => ['required'],
                    'state' => ['required'],
                    'city' => ['required'],
                    'dob' => ['required'],
                    'nick_name'=> ['required'],
                     'password' => ['required'],
                    'profile' => ['required'],
                    'passport' => ['required'],
                     'email' => ['required','email','regex:/^\S*$/u',
                     'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',Rule::unique('users')->where(function ($query) use($request) {
                         return $query->where('email', $request->email)->where('status','<>', 'Trash');
                     })],
                     'mobile' => ['required','numeric', 'digits_between:1,15',
                     Rule::unique('users')->where(function ($query) use($request) {
                         return $query->where('mobile', $request->mobile)->where('status','<>', 'Trash');
                     })],
                 ]);
                //  print_r($request->first_name);exit;
//            $pwd=Str::random(8);
            $data = new User();
            $data->token = Str::random(8);
            $data->user_type ='student';
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->password = md5($request->password);
            $data->gender = $request->gender;
            $data->dob =  $request->dob;
             $data->nick_name = $request->nick_name;
            $data->country =  $request->country;
            $data->state =  $request->state;
            $data->city =  $request->city;
            $data->mobile = $request->mobile;            
            $data->address = !empty($request->address) ? $request->address : "";
            $profile = $request->file('profile');
                $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                $destinationPath = public_path('/files/proof/');
                $chck= $profile->move($destinationPath, $imagename);
                $data->profile = $imagename;
                $passport = $request->file('passport');
                $imagename = uniqid() . '.' . $passport->getClientOriginalExtension();
                $destinationPath = public_path('/files/proof/');
                $chck= $passport->move($destinationPath, $imagename);
                $data->passport = $imagename;
            $data->datetime = date('Y-m-d H:i:s');
            $data->status = "Active";   
            // print_r($data);exit;
            $data->save();    
            $id = $data->user_id;
            // send mail pending
            $emailcontent = Emailcontent::where('id', '4')->first();
            if (!empty($emailcontent) && !empty($data->email)) {
                $message = str_replace(array('{name}','{password}'), array($data->first_name,$request->password), $emailcontent->emailcontent);
                $mail = Parent::sendmail($message, $emailcontent->subject, $emailcontent->from_email, $emailcontent->from_name, $data->email,'');
            // dd($mail);
            } 
            Session::flash('message', 'Student Registered Sucessfully!');
            Session::flash('alert-class', 'success');
            return \Redirect::route('admin.users.students', []);
            }
        }
        public function editstudent($id = null)
        {
            $sessionadmin = Parent::checkadmin();
            $detail = User::where('users.user_id', '=', $id)->first();
            return view('users/editstudent', ['detail' => $detail]);
        }
        public function update_student(Request $request, $id = null)
        {
            if ($request->has('submit')) {
                // print_r($request);exit;
                $this->validate($request, [
                    'first_name' => ['required'],
                    'last_name' => ['required'],
                    'gender' => ['required'],
                    'country' => ['required'],
                    'state' => ['required'],
                    'city' => ['required'],
                    'dob' => ['required'],
                    'nick_name'=> ['required'],
                    // 'city' => ['required'],
                     'email' => ['required','email','regex:/^\S*$/u',
                     'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',Rule::unique('users')->where(function ($query) use($request, $id) {
                         return $query->where('email', $request->email)->where('user_id','<>',$id)->where('status','<>', 'Trash');
                     })],
                     'mobile' => ['required','numeric', 'digits_between:1,15',
                     Rule::unique('users')->where(function ($query) use($request, $id) {
                         return $query->where('mobile', $request->mobile)->where('user_id','<>',$id)->where('status','<>', 'Trash');
                     })],
                 ]);
                $data = User::findOrFail($id);
                $data->first_name = $request->first_name;
                $data->last_name = $request->last_name;
                $data->email = $request->email;
                $data->gender = $request->gender;
                $data->dob =  $request->dob;
                $data->country =  $request->country;
                $data->state =  $request->state;
                $data->passport_no =  $request->passport_no;
                $data->nick_name = $request->nick_name;
                $data->city =  $request->city;
                $data->mobile = $request->mobile;   
                $data->password = !empty($request->password)?(md5($request->password)):$data->password;
                $data->address = !empty($request->address) ? $request->address : "";
                if (!empty($request->file('profile'))) {
                $profile = $request->file('profile');
                    $imagename = uniqid() . '.' . $profile->getClientOriginalExtension();
                    $destinationPath = public_path('/files/proof/');
                    $chck= $profile->move($destinationPath, $imagename);
                    $data->profile = $imagename;
                }
                if (!empty($request->file('passport'))) {
                    $passport = $request->file('passport');
                    $imagename = uniqid() . '.' . $passport->getClientOriginalExtension();
                    $destinationPath = public_path('/files/proof/');
                    $chck= $passport->move($destinationPath, $imagename);
                    $data->passport = $imagename;
                }
              $data->save();    
               
                Session::flash('message', 'Student Updated Sucessfully!');
                Session::flash('alert-class', 'success');
                    return \Redirect::route('admin.users.students', []);
            }
        }
        public function delete_student(Request $request, $id = null)
    {        
             $delete=User::where('user_id',$id)->delete();
            // $data = User::findOrFail($id);
            // $data->status = 'Trash';
            // $data->save();
            Session::flash('message', 'Deleted Sucessfully!');
            Session::flash('alert-class', 'success');
            return Redirect::back();
    }
    
    public function get_countrycode(Request $request)
    {        
        $country = Country::where('id',$_REQUEST['id'])->first();
//         print_r($country);
        $select=$country->country_code;
        
        return $select;
    }
     public function map(Request $request){
        if (!empty($_REQUEST['country'])) {
            $id = $_REQUEST['country'];
            $states = State::where('country_id',$id)->get();
            //print_r($states);exit;
            echo '<option value="">Select State</option>';
            foreach ($states as $state) {
                echo '<option value="' . $state->id . '">' . $state->name . '</option>';
            }
            exit;
        } else if (!empty($_REQUEST['state'])) {
            $id = $_REQUEST['state'];
            $cities = City::where('state_id',$id)->get();
            echo '<option value="">Select City</option>';
            foreach ($cities as $city) {
                echo '<option value="' . $city->id . '">' . $city->name . '</option>';
            }
            exit;
        }
    }
}
