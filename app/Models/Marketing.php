<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Marketing extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 protected $table = 'marketing';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'referral_source',
        'phone',
        'address',
        'last_contact_date',
        'business_name',
    ];
	
	
	public static function apiSubmitRules($data) {
       
        $error = '';

        if (empty($data['name'])) {

          return  $error = "Name is required.";

        }else if (empty($data['business_name'])) {

          return  $error = "Business name is required.";

        
        }
		

        return $error;
    }
    
}
