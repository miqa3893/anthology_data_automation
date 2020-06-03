<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TwitterLoginController extends Controller
{
    public function getAuth(){
        return Socialite::driver('twitter')->redirect();
    }

    public function authCallback(Request $request){
        try{
            $user = Socialite::driver('twitter')->user();
        }catch (Exception $e){
            return redirect(route('login'));
        }

        // 登録ユーザが見つからない場合、システムから弾き出す
        $authUser = $this->findUser($user);
        if(is_null($authUser)){
            return view('invalid');
        }

        Auth::login($authUser,true);

        return redirect()->route('home');
    }

    public function findUser($twitterUser){

        $authUser = User::where('twitter_id',$twitterUser->nickname)->first();

        if($authUser){
            return $authUser;
        }

        return null;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }


}
