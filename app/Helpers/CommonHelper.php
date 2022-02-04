<?php
namespace App\Helpers;

use App\Models\User;
use App\Models\Client;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;

class CommonHelper {
    
   
   

	public static function getClientDetails($user_id=null){
			$user = Client::where('id', $user_id)->first();
			
			return $user;
	}
	

	public static function getStaffDetails($user_id=null){
			$user = Staff::where('id', $user_id)->first();
			
			return $user;
	}
	
	
}
