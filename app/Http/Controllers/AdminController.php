<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Hash;
use Auth;
use App\Models\Staff;
use App\Models\Timesheet;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Client;
use App\Models\Marketing;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
		$this->middleware(function ($request, $next) {
			if(isset(Auth::user()->role) && !empty(Auth::user()->role)){
				$user_role = Auth::user()->role;
				$message = "Your are not authorized to access this link";
				if($user_role == "1"){
					 return $next($request);
				}else{
					if($user_role == "2"){
						return redirect('staff/dashboard')->with('error',$message);
					}elseif($user_role == "3"){
						return redirect('client/dashboard')->with('error',$message);
					}
				}
			}else{
				return $next($request);
			}

		});
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	
		$current_date = date('Y-m-d');
		 $data['client_count'] = Client::where('is_deleted',NULL)->get()->count();
		 $data['staff_count'] = Staff::where('is_deleted',NULL)->get()->count();
		 $data['schedule_count'] = Schedule::where('is_deleted',NULL)->where('date_in',$current_date)->get()->count();
		 
		 
		 
        return view('admin/dashboard',$data);
    }
   
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function schedule()
    {
		$data['schedule_list'] = Schedule::where('is_deleted',NULL)->get();
        return view('admin/schedule',$data);
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addSchedule()
    {
		$data['ClientList'] = Client::where('is_deleted',NULL)->get();
		$data['StaffList'] = Staff::where('is_deleted',NULL)->get();
        return view('admin/add-schedule',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editsSchedule($id=null)
    {
		$data['id'] = $id;
		$data['timesheetDetail'] = Timesheet::where('id',$id)->first();
		$data['ClientList'] = Client::where('is_deleted',NULL)->get();
        $data['StaffList'] = Staff::where('is_deleted',NULL)->get();
        return view('admin/add-schedule',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submitaddSchedule(Request $request)
    {
       
		
		$message = ""; //Schedule::apiSubmitRules($request->all());
	
		if($message == ""){
			
			
			if(isset($request->staff_id) && !empty($request->staff_id)){
			    $i=0;
			    foreach($request->staff_id as $staff_id){
		            
		            
		             if(!empty($staff_id)){
		                 $record = Schedule::where('staff_id',$staff_id)->where('date_in',$request->date_in[$i])->where('time_in',$request->time_in[$i])->first();
			
            			if(isset($request->id) && !empty($request->id)){
            				$record = Schedule::where('staff_id',$staff_id)->where('date_in',$request->date_in[$i])->where('id',$request->id)->first();
            				 if(isset($record['staff_id']) && ($request->staff_id == $record['staff_id'])){
            					 $record = "";
            				 }
            			}
            			
            			
            			if(empty($record)){
            				if(!isset($request->id) && empty($request->id)){
            
            					$Staff = Schedule::create([
            						'staff_id' =>  $staff_id,
            						'client_id' =>  $request->client_id[$i],
            						'time_in' => $request->time_in[$i],
            						'time_out' => $request->time_out[$i],
            						'date_in' => $request->date_in[$i],
            						'month' => date('m',strtotime($request->date_in[$i])),
            						'year' => date('Y',strtotime($request->date_in[$i])),
            						'admin_notes' => $request->admin_notes[$i],
            					]);
            					
            					
            					
            					$Staff = Timesheet::create([
                            		'user_id' =>  $staff_id,
                            		'time_in' => $request->time_in[$i],
                            		'time_out' => $request->time_out[$i],
                            		'date_in' => $request->date_in[$i],
                            		'month' => date('m',strtotime($request->date_in[$i])),
                            		'year' => date('Y',strtotime($request->date_in[$i])),
                            	]);
            
            					
            					 
            				}else{
            				    /*
            					$saveData['staff_id'] = $request->staff_id;
            					$saveData['client_id'] = $request->client_id[$i];
            					$saveData['time_in'] = $request->time_in[$i];
            					$saveData['time_out'] = $request->time_out[$i];
            					$saveData['date_in'] = $request->date_in[$i];
            					$saveData['admin_notes'] = $request->admin_notes[$i];
            					
            					
            					
            					$affectedRows = Schedule::where("id", $request->id)->update($saveData);
            					
            					
            					/*
            					$saveData1['user_id'] = $request->user_id;
            					$saveData1['time_in'] = $request->time_in;
            					$saveData1['time_out'] = $request->time_out;
            					$saveData1['date_in'] = $request->date_in;
            					
            					
            					
            					$affectedRows = Timesheet::where("id", $request->id)->update($saveData1);*/
            					
            					/*
            					 return redirect()->back()->with('success','Schedule has been updated successfully. ');
            					 */
            				}
            			}else{
            				  return redirect()->back()->with('error',"Already Added in this date");
            			}
		             }
		             
		             
		             
		            $i++; 
			    }
			    	 return redirect()->back()->with('success','Schedule has been added successfully. ');
			}
			
			
			
			
		}else{
			//print_r($message); die;
			
			
			  return redirect()->back()->with('error',$message);
		}
       
    }
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staffList()
    {
		if(isset($_GET['status']) && !empty($_GET['status'])){
			$data['staff_list'] = Staff::where('is_deleted',NULL)->where('status',$_GET['status'])->get();
		}else{
			$data['staff_list'] = Staff::where('is_deleted',NULL)->get();
		}
		
		
        return view('admin/staff-list',$data);
    }
    
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }
    
     function rand_username( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        return substr(str_shuffle($chars),0,$length);
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addStaff()
    {
        
        
        $data['username'] = $this->rand_username(8);
        $data['password'] = $this->rand_string(8);
        
        return view('admin/add-staff',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editStaff($id=null)
    {
		$data['id'] = $id;
		$data['staffDetail'] = Staff::where('id',$id)->first();
		$data['userData'] = User::where('id',$data['staffDetail']['user_id'])->first();
        return view('admin/add-staff',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submitaddStaff(Request $request)
    {
		
		$message = Staff::apiSubmitRules($request->all());
	
		if($message == ""){
			if($file = $request->file('image')){
					$image_name = md5(rand(1000,10000));
					$ext = strtolower($file->getClientOriginalExtension());
					$image_full_name = $image_name.'.'.$ext;
					$uploade_path = 'staff/';
					$image_url = $image_full_name;
					$file->move($uploade_path,$image_full_name);
				   $image = $image_url;
					
			}else{
				if(isset($request->old_image) && !empty($request->old_image)){
					$image = $request->old_image;
				}else{
					 $image = '';
				}
				
			}
			
			if(!isset($request->id) && empty($request->id)){
				
				
				$encodedname =  "";//base64_encode($request->name);
				
				$status = $request->status;
				
				if($status == 2){
					$leaving_date = $request->leaving_date;
					$leaving_reason = $request->leaving_reason;
					$is_active = '2';
				}else{
					$leaving_date = "";
					$leaving_reason = "";
					$is_active = '1';
				}
				
				
				$user_id = User::create([
					'name' => $request->name,
					'username' => $request->username,
					'password' => bcrypt($request->password),
					 'password_txt' => $request->password,
					'email' => $request->email,
					'temp_password' => '',
					'encoded_id' => $encodedname,
					'role' => '2',
					'is_active' =>$is_active,
				])->id;
				
				
				$Staff = Staff::create([
					'user_id' =>  $user_id,
					'employee_code' => $request->employee_code,
					'name' => $request->name,
					'joining_date' => $request->joining_date,
					'registery_no' => $request->registery_no,
					'licence_no' => $request->licence_no,
					'expiry_date' => $request->expiry_date,
					'email' => $request->email,
					'phone' => $request->phone,
					'age'=> $request->age,
					'address'=> $request->address,
					'hourly_rate'=> $request->hourly_rate,
					'photo' => $image,
					'status' => $status,
					'leaving_date' => $leaving_date,
					'leaving_reason' => $leaving_reason,
				]);
				
				
				$data = array(
					'name'      =>  $request->name,
					'message'   =>   "Your temp pass is 123456"
				);
				/*
				$to_name = $request->name;
				$to_email = $request->email;
				$data = array('name'=>$request->email,'message2' => "Hello ".$request->name.", <br><br>Thank you for showing interest in Diversecare.com. <br><br> Congratulations! Your account is ready to use.Please click the link below or copy and paste in your browser. <br> <br> http://asadi1.sg-host.com/diversecare/public/staff/registration/".$encodedname." <br><br> Please use the following login details to login in: <br><br>Email : ".$request->email." <br>Temporary Password : 123456 <br><br>If you face any problem,please write back to us.<br><br>Thank you! <br><br><br>Team Diverse Care");
				Mail::send('email.new-user-create', $data, function($message) use ($to_name, $to_email) {
				$message->to($to_email, $to_name)
				->subject('Your Diverse Care Account is Ready');
				$message->from('demo231993@gmail.com','Diversecare.com');
				});
				*/
				 return redirect()->back()->with('success','Staff has been added successfully. ');
				 
			}else{
				
				$status = $request->status;
				
				if($status == 2){
					$leaving_date = $request->leaving_date;
					$leaving_reason = $request->leaving_reason;
					$is_active = '2';
				}else{
					$leaving_date = "";
					$leaving_reason = "";
					$is_active = '1';
				}
				
				
				$saveData['employee_code'] = $request->employee_code;
				$saveData['name'] = $request->name;
				$saveData['user_id'] = $request->user_id;
				$saveData['joining_date'] = $request->joining_date;
				$saveData['registery_no'] = $request->registery_no;
				$saveData['licence_no'] = $request->licence_no;
				$saveData['expiry_date'] = $request->expiry_date;
				$saveData['email'] = $request->email;
				$saveData['phone'] = $request->phone;
				$saveData['age'] = $request->age;
				$saveData['address'] = $request->address;
				$saveData['hourly_rate'] = $request->hourly_rate;
				$saveData['photo'] = $image;
				$saveData['status'] = $status;
				$saveData['leaving_date'] = $leaving_date;
				$saveData['leaving_reason'] = $leaving_reason;
				
				
				
				
				
				$saveUserData['name'] = $request->name;
				$saveUserData['email'] = $request->email;
				$saveUserData['is_active'] = $is_active;
				
				if(isset($request->password) && !empty($request->password)){
			    	$saveUserData['password'] = bcrypt($request->password);
			    	$saveUserData['password_txt'] = $request->password;
				}
				
				
				$affectedRows = Staff::where("id", $request->id)->update($saveData);
				$affectedRows = User::where("id", $request->user_id)->update($saveUserData);
				 return redirect()->back()->with('success','Staff has been updated successfully. ');
			}
		}else{
			//print_r($message); die;
			
			
			  return redirect()->back()->with('error',$message);
		}
       
    }
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function timesheet()
    {
		
		if(isset($_GET['date']) && !empty($_GET['date'])){
			$currentData = $_GET['date'];
		}else{
			$currentData = date('Y-m-d');
		}
		
		
		$result3 = DB::table('timesheets')
            ->join('staffs', 'timesheets.user_id', '=', 'staffs.id')
            ->select('timesheets.*','staffs.name','staffs.employee_code')
            //->where('staffs.user_id',$_GET['supplier'])
            ->where('timesheets.is_deleted',NULL)
            ->where('timesheets.date_in',$currentData)
			->orderBy('id','DESC')
            ->get(); 
		
		
		$data['timesheet_list'] = $result3;
        return view('admin/timesheet',$data);
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addTimesheet()
    {
		$data['StaffList'] = Staff::where('is_deleted',NULL)->get();
        return view('admin/add-timesheet',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTimesheet($id=null)
    {
		$data['id'] = $id;
		$data['timesheetDetail'] = Timesheet::where('id',$id)->first();
        $data['StaffList'] = Staff::where('is_deleted',NULL)->get();
        return view('admin/add-timesheet',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submitaddTimesheet(Request $request)
    {
		
		$message = Timesheet::apiSubmitRules($request->all());
	
		if($message == ""){
			
			$record = Timesheet::where('user_id',$request->user_id)->where('date_in',$request->date_in)->first();
			
			if(isset($request->id) && !empty($request->id)){
				$record = Timesheet::where('user_id',$request->user_id)->where('date_in',$request->date_in)->where('id',$request->id)->first();
				 if(isset($record['user_id']) && ($request->user_id == $record['user_id'])){
					 $record = "";
				 }
			}
			
			if(empty($record)){
				if(!isset($request->id) && empty($request->id)){

					$Staff = Timesheet::create([
						'user_id' =>  $request->user_id,
						'time_in' => $request->time_in,
						'time_out' => $request->time_out,
						'date_in' => $request->date_in,
						'month' => date('m',strtotime($request->date_in)),
						'year' => date('Y',strtotime($request->date_in)),
					]);
					
					
					 return redirect()->back()->with('success','Timesheet has been added successfully. ');
					 
				}else{
					$saveData['user_id'] = $request->user_id;
					$saveData['time_in'] = $request->time_in;
					$saveData['time_out'] = $request->time_out;
					$saveData['date_in'] = $request->date_in;
					
					
					
					$affectedRows = Timesheet::where("id", $request->id)->update($saveData);
					 return redirect()->back()->with('success','Timesheet has been updated successfully. ');
				}
			}else{
				  return redirect()->back()->with('error',"Already Added in this date");
			}
			
		}else{
			//print_r($message); die;
			
			
			  return redirect()->back()->with('error',$message);
		}
       
    }
	
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clientList()
    {
		if(isset($_GET['status']) && !empty($_GET['status'])){
			$data['client_list'] = Client::where('is_deleted',NULL)->where('status',$_GET['status'])->get();
		}else{
			$data['client_list'] = Client::where('is_deleted',NULL)->get();
		}
		
		
		
        return view('admin/client-list',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addClient()
    {
        $data['username'] = $this->rand_username(8);
        $data['password'] = $this->rand_string(8);
        return view('admin/add-client',$data);
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editClient($id=null)
    {
		$data['id'] = $id;
		$data['staffDetail'] = Client::where('id',$id)->first();
			$data['userData'] = User::where('id',$data['staffDetail']['user_id'])->first();
        return view('admin/add-client',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submitaddClient(Request $request)
    {
		
		$message = Client::apiSubmitRules($request->all());
	
		if($message == ""){
			if($file = $request->file('image')){
					$image_name = md5(rand(1000,10000));
					$ext = strtolower($file->getClientOriginalExtension());
					$image_full_name = $image_name.'.'.$ext;
					$uploade_path = 'client/';
					$image_url = $image_full_name;
					$file->move($uploade_path,$image_full_name);
				   $image = $image_url;
					
			}else{
				if(isset($request->old_image) && !empty($request->old_image)){
					$image = $request->old_image;
				}else{
					 $image = '';
				}
				
			}
			
			if(!isset($request->id) && empty($request->id)){
				
				$encodedname =  base64_encode($request->name);
				
				$status = $request->status;
				
				if($status == 2){
					$leaving_date = $request->leaving_date;
					$leaving_reason = $request->leaving_reason;
					$is_active = '2';
				}else{
					$leaving_date = "";
					$leaving_reason = "";
					$is_active = '1';
				}
				
				
				$user_id = User::create([
				    'username' => $request->username,
				   'password' => bcrypt($request->password),
				   'password_txt' => $request->password,
					'name' => $request->name,
					'email' => $request->email,
					'temp_password' => '123456',
					'encoded_id' => $encodedname,
					'role' => '3',
					'is_active' => $is_active,
				])->id;
				
				
				
				
				$Client = Client::create([
					'user_id' =>  $user_id,
					'name' => $request->name,
					'joining_date' => $request->joining_date,
					
					'email' => $request->email,
					'phone' => $request->phone,
					'age'=> $request->age,
					'address'=> $request->address,
					'hourly_rate'=> $request->hourly_rate,
					'photo' => $image,
					'status' => $status,
					'leaving_date' => $leaving_date,
					'leaving_reason' => $leaving_reason,
				]);
				
				$data = array(
					'name'      =>  $request->name,
					'message'   =>   "Your temp pass is 123456"
				);
				/*
				$to_name = $request->name;
				$to_email = $request->email;
				$data = array('name'=>$request->email,'message2' => "Hello ".$request->name.", <br><br>Thank you for showing interest in Diversecare.com. <br><br> Congratulations! Your account is ready to use.Please click the link below or copy and paste in your browser. <br> <br> http://asadi1.sg-host.com/diversecare/public/client/registration/".$encodedname." <br><br> Please use the following login details to login in: <br><br>Email : ".$request->email." <br>Temporary Password : 123456 <br><br>If you face any problem,please write back to us.<br><br>Thank you! <br><br><br>Team Diverse Care");
				Mail::send('email.new-user-create', $data, function($message) use ($to_name, $to_email) {
				$message->to($to_email, $to_name)
				->subject('Your Diverse Care Account is Ready');
				$message->from('demo231993@gmail.com','Diversecare.com');
				});
				*/
				
				 return redirect()->back()->with('success','Client has been added successfully. ');
				 
			}else{
				
				$status = $request->status;
				
				if($status == 2){
					$leaving_date = $request->leaving_date;
					$leaving_reason = $request->leaving_reason;
					$is_active = '2';
				}else{
					$leaving_date = "";
					$leaving_reason = "";
					$is_active = '1';
				}
				
				
				$saveData['name'] = $request->name;
				$saveData['joining_date'] = $request->joining_date;
				
				$saveData['email'] = $request->email;
				$saveData['phone'] = $request->phone;
				$saveData['age'] = $request->age;
				$saveData['address'] = $request->address;
				$saveData['hourly_rate'] = $request->hourly_rate;
				$saveData['photo'] = $image;
				$saveData['status'] = $status;
				$saveData['leaving_date'] = $leaving_date;
				$saveData['leaving_reason'] = $leaving_reason;
				
				
				$saveUserData['name'] = $request->name;
				$saveUserData['email'] = $request->email;
				$saveUserData['is_active'] = $is_active;
				
				if(isset($request->password) && !empty($request->password)){
			    	$saveUserData['password'] = bcrypt($request->password);
		    		$saveUserData['password_txt'] = $request->password;
			    	
				}
				

				$affectedRows = User::where("id", $request->user_id)->update($saveUserData);
				
				
				$affectedRows = Client::where("id", $request->id)->update($saveData);
				 return redirect()->back()->with('success','Client has been updated successfully. ');
			}
		}else{
			//print_r($message); die;
			
			
			  return redirect()->back()->with('error',$message);
		}
       
    }
	
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function marketing()
    {
		$data['market_list'] = Marketing::where('is_deleted',NULL)->get();
        return view('admin/marketing',$data);
    }
	
	 
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addMarketing()
    {
        return view('admin/add-marketing');
    }
	
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editMarketing($id=null)
    {
		$data['id'] = $id;
		$data['marketDetail'] = Marketing::where('id',$id)->first();
        return view('admin/add-marketing',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submitaddMarketing(Request $request)
    {
		
		$message = Marketing::apiSubmitRules($request->all());
	
		if($message == ""){
			
			
			
			if(!isset($request->id) && empty($request->id)){
				$Client = Marketing::create([
					'user_id' =>  Auth::id(),
					'name' => $request->name,
					'last_contact_date' => $request->last_contact_date,
					'referral_source' => $request->referral_source,
					'phone' => $request->phone,
					'business_name'=> $request->business_name,
					'address'=> $request->address,

				]);
				 return redirect()->back()->with('success','Marketing has been added successfully. ');
				 
			}else{
				$saveData['name'] = $request->name;

				$saveData['last_contact_date'] = $request->last_contact_date;
				
				$saveData['referral_source'] = $request->referral_source;
				$saveData['phone'] = $request->phone;
				$saveData['business_name'] = $request->business_name;
				$saveData['address'] = $request->address;

				
				$affectedRows = Marketing::where("id", $request->id)->update($saveData);
				 return redirect()->back()->with('success','Marketing has been updated successfully. ');
			}
		}else{
			//print_r($message); die;
			
			
			  return redirect()->back()->with('error',$message);
		}
       
    }
	
	
	
	public function showChangePasswordForm(){
        return view('admin.changepassword');
    }
	
	public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
	
	
	public function deleteByID($model,$id){
		
		 $model =    $model;
        if($model != "User"){
            $appPrefix = "App\Models";
        }else{
            $appPrefix = "App\Models";
        }
		

        $modelName  = $appPrefix.'\\'.$model;
		
		
		$models = $modelName::find($id);
        $models->delete();


		 return redirect()->back()->with('success','Deleted successfully.');
		
		
			
	}
}
