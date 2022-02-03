<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Timesheet extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 protected $table = 'timesheets';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'time_in',
        'time_out',
        'date_in',
        'month',
        'year',
        'is_deleted',
    ];
	
	
	public static function apiSubmitRules($data) {
       
        $error = '';

        if (empty($data['user_id'])) {

          return  $error = "Emp is required.";

        }elseif (empty($data['time_in'])) {

          return  $error = "Time is required.";

        }else if (empty($data['time_out'])) {

          return  $error = "Time is required.";

        
        }else if (empty($data['date_in'])) {

          return  $error = "Date is required.";

        
        }
		

        return $error;
    }
    
}
