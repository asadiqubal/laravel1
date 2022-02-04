<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Models\Client;


class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 protected $table = 'clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'joining_date',
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
		
		if(isset($data['id']) && !empty($data['id'])){
			$client = Client::where('id',$data['id'])->first();
			
			$user = User::where('username',$data['username'])->where('id','!=',$client['user_id'])->get()->count();
		}else{
			$user = User::where('username',$data['username'])->get()->count();
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
