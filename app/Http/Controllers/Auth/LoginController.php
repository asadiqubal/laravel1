<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule; 

use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
 protected $username;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
	
	public function redirectTo() {
	  $role = \Auth::user()->role; 
	  
	  switch ($role) {
		case '1':
		  return '/admin/dashboard';
		  break;
		case '2':
		  return '/staff/dashboard';
		  break; 
		case '3':
		  return '/client/dashboard';
		  break; 
		default:
		  return '/home'; 
		break;
	  }
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }
	
	
	/**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('email');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
    
	
	protected function validateLogin(Request $request)
	{
		$this->validate($request, [
			$this->username() => Rule::exists('users')->where(function ($query) {
				$query->where('is_active', 1);
			}),
			'password' => 'required|string'
		]);
	}
	

}
