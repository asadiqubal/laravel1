<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Staff;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Client;
use App\Models\Marketing;
use DB;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
		$this->middleware('auth',['except'=>['registration','templogin','setpassword','submitpassword','linkExired']]);
	   
		$this->middleware(function ($request, $next) {
			if(isset(Auth::user()->role) && !empty(Auth::user()->role)){
				$user_role = Auth::user()->role;
				$message = "Your are not authorized to access this link";
				if($user_role == "3"){
					 return $next($request);
				}else{
					if($user_role == "1"){
						return redirect('admin/dashboard')->with('error',$message);
					}elseif($user_role == "2"){
						return redirect('staff/dashboard')->with('error',$message);
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

		$currentData = date('Y-m-d');
		$clientDtails = Client::where('user_id',Auth::user()->id)->first();
		$data['schedule_today_count'] = Schedule::where('client_id',$clientDtails['id'])->where('date_in','>=',$currentData)->get()->count();
		$data['schedule_past_count'] = Schedule::where('client_id',$clientDtails['id'])->where('date_in','<',$currentData)->get()->count();
		 
        return view('client/dashboard',$data);
    }

	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function pastVisit()
    {
		$currentData = date('Y-m-d');
		$clientDtails = Client::where('user_id',Auth::user()->id)->first();
		$data['record'] = Schedule::where('client_id',$clientDtails['id'])->where('date_in','<',$currentData)->get();
	
        return view('client/past-visit',$data);
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function todaySchedule()
    {
		$currentData = date('Y-m-d');
		$clientDtails = Client::where('user_id',Auth::user()->id)->first();
		$data['record'] = Schedule::where('client_id',$clientDtails['id'])->where('date_in','>=',$currentData)->get();
        return view('client/today-schedule',$data);
    }
	
	
	
	public function registration($id)
    {
		
		$userData = User::where('encoded_id',$id)->get();
	
		if(empty($userData[0]['email'])){
			return redirect('login')->with('error','Invalid user details.');		
		}
		if(empty($userData[0]['temp_password'])){
			if($userData[0]['role'] == "2"){
				return redirect('staff/link-expired')->with('error','You have already completed your account setup. Click here to go to login page.');
			}else{
				return redirect('client/link-expired')->with('error','You have already completed your account setup. Click here to go to login page.');
			}
					
		}
		
		$data['username']=  $userData[0]['email'];
		$data['password']=  $userData[0]['temp_password'];
		if($userData[0]['role'] == "2"){
			return view('staff.welcome',$data);
		}else{
			return view('client.welcome',$data);
		}
        
    }
	
	public function templogin(Request $request)
    {
       $password = $request['password'];
       $email = $request['email'];
	   
	   $data = User::where('email',$email)->where('temp_password',$password)->get();
       
		if ($data->count()>0) {
			if($data[0]['role'] == "2"){
				return redirect('staff/set-password/'.$data[0]['encoded_id']);
			}else{
				return redirect('client/set-password/'.$data[0]['encoded_id']);
			}
			
				
			
		}else{
			return redirect()->back()->with('error','Invalid login details.');		
		}
    }
	public function setpassword($id){
	
		$userid = $id;
		$data = User::where('encoded_id',$id)->get();
		if(empty($userid)){
			return redirect()->back()->with('error','Invalid login details.');	
		}
		$data['userid'] = $userid;
		
		if($data[0]['role'] == "2"){
			return view('staff.setpassword',$data);
		}else{
			return view('client.setpassword',$data);
		}
		
		
	}
	
	public function submitpassword(Request $request){
		
		$input = $request->all();
		$password     =   $input['password'];
        $user_id     =   $input['user_id'];
		$password = $password;
		$hashedPassword = Hash::make($password);
		
		 User::where('encoded_id', $user_id)
            ->update([
                'password' => $hashedPassword,
                'temp_password' => '',
                ]);
				
		return redirect('login')->with('success','Updated successfully');
		
		
	}
	
	public function linkExired(){
		return view('staff.link-exired');
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
	
	
	public function showChangePasswordForm(){
        return view('client.changepassword');
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
        $user->password_txt = $request->get('new-password');
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
	
	
	public function submitNotesForm(Request $request){
		
		$input = $request->all();
		$client_notes     	=   $input['client_notes'];
		$id     			=   $input['id'];
		
		
		 Schedule::where('id', $id)
			->update([
				'client_notes' => $client_notes
				]);
				
		return redirect('client/today-schedule')->with('success','Updated successfully');
		
		
	}
}
