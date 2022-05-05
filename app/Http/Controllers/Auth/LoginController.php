<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo = '/procesos'; //RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //event(new UserSessionChanged("TEST","succes"));
        $user = auth()->user();

        //dd($user);
                /* if($user->role_id==1){
                    return redirect(RouteServiceProvider::HOME);
                 }else{
                    return redirect('/dashboard-alternate');
                   
                 }*/

        $this->middleware('guest')->except('logout');
    }

    public function authenticated($request , $user){
     
        //dd($user->imagen);
        if($user->role_id==1){
            return redirect('/admin/procesos')->with('error',$user->id);
            
        }else{
            return redirect('/admin/procesos')->with('error',$user->id);
        }
    }

    public function showLogin(){
 
       // $this->middleware('guest')->except('logout');
        return redirect('/login');
       }

    protected function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
