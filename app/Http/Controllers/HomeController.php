<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $isUsers = \Auth::user();  
        $user_id = $isUsers->id;
        $userSetting = DB::table('settings')->where('user_id', $user_id)->first();

        if(isset($userSetting) && $userSetting->verify_status == '1')
        {
            // $this->validator($request->all())->validate();
    
            $google2fa = app('pragmarx.google2fa');
    
            $registration_data = $request->all();
            
            if($isUsers->google2fa_secret == '')
            {
                $google2fa_secret = $google2fa->generateSecretKey();
                $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();  
                DB::update('update users set google2fa_secret = "'.$google2fa_secret.'" where id = ?', [$user_id]);              
            }           
            else{
                $google2fa_secret =  $isUsers->google2fa_secret;
            }
    
            $request->session()->flash('registration_data', $registration_data);
    
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $isUsers->email,
                $google2fa_secret
            );            
            
            return view('google2fa.index', ['QR_Image' => $QR_Image, 'secret' => $google2fa_secret]);     
        }
        else{
            return view('dashboard'); 
        }         
    }

    public function verify()
	{        
		return view('google2fa.index');
	}
    public function dashboard()
	{        
		return view('dashboard');
	}
  
}
