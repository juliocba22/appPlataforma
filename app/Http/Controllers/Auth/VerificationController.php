<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo ='/dashboard-alternate';//RouteServiceProvider::'/dashboard-alternate';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    
    public function verificar($code){
       
         //dd($code);
   
        //  $userFace = Socialite::driver($provider)->user();
           $user = User::where('confirmation_code',$code)->first();
  // dd($user);
           if(!$user){
           //   return redirect('/'); 
           }
           $user->confirmed = true;
           $user->confirmation_code = null;
           $user->email_verified_at =  Carbon::now();
           $user->save();
           //Auth::login($userFace);
            return redirect('/dashboard-alternate')->with('notification','Has confirmado correctamente tu correo');
       } 


       public function resend(){
       
       // dd(auth()->user()->email);
  
       //  $userFace = Socialite::driver($provider)->user();
          $user = User::where('email',auth()->user()->email)->first();
 // dd($user);
          if(!$user){
          //   return redirect('/'); 
          }

          $data['confirmation_code']= auth()->user()->confirmation_code;
          $data['email']= auth()->user()->email;
          $data['name']= auth()->user()->name;
          Mail::send('mails.confirmation_code', $data, function($message) use($data){
            $message->to($data['email'] , $data['name'])->subject('Por favor confirmar tu correo');
        });  
           return redirect('/dashboard-alternate');
      } 
    
}
