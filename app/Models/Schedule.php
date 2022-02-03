<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Schedule extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 protected $table = 'schedules';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'staff_id',
        'client_id',
        'time_in',
        'time_out',
        'date_in',
        'month',
        'status',
        'year',
        'admin_notes',
        'client_notes',
        'staff_notes',
        'is_deleted',
    ];
	
	
	public static function apiSubmitRules($data) {
       
        $error = '';

        if (empty($data['staff_id'])) {

          return  $error = "Emp is required.";

        }elseif (empty($data['client_id'])) {

          return  $error = "Client is required.";

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
