<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
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
			$user_role = Auth::user()->role;
			$message = "";
			if($user_role == "2"){
				return redirect('satff/dashboard')->with('error','');
			}else{
				if($user_role == "1"){
					return redirect('admin/dashboard')->with('error',$message);
				}elseif($user_role == "3"){
					return redirect('client/dashboard')->with('error',$message);
				}
				  
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
        return view('admin/dashboard');
    }
   
	
	public function showChangePasswordForm(){
        return view('auth.changepassword');
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
	
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function schedule()
    {
        return view('schedule');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function timesheet()
    {
        return view('timesheet');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staffList()
    {
        return view('staff-list');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function marketing()
    {
        return view('marketing');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clientList()
    {
        return view('client-list');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addStaff()
    {
        return view('add-staff');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addMarketing()
    {
        return view('add-marketing');
    }
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addClient()
    {
        return view('add-client');
    }
}
