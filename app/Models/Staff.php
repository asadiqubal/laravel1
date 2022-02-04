<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Models\Staff;


class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 protected $table = 'staffs';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'employee_code',
        'name',
        'joining_date',
        'registery_no',
        'licence_no',
        'expiry_date',
        'phone',
        'age',
        'email',
        'address',
        'photo',
        'status',
        'leaving_date',
        'leaving_reason',
        'hourly_rate',
    ];
	
	
	public static function apiSubmitRules($data) {
       
        $error = '';
		
		$user = 0;
		if(isset($data['id']) && !empty($data['id'])){
			$staff = Staff::where('id',$data['id'])->first();
			
			$user = User::where('username',$data['username'])->where('id','!=',$staff['user_id'])->get()->count();
		}else{
		    if(isset($data['username']) && !empty($data['username'])){
		        $user = User::where('username',$data['username'])->get()->count();    
		    }
			
		}
		
		
		if($user > 0){
			return  $error = "Already registered this username";
		}
		
         if (empty($data['username'])) {

          return  $error = "Username is required.";

        
        }else if (empty($data['password'])) {

          return  $error = "Password is required.";

        
        }else if (empty($data['name'])) {

          return  $error = "Name is required.";

        }
		

        return $error;
    }
    
}
