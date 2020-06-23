<?php

namespace App\Http\Controllers;

use App\User;
use App\Work;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TwitterLoginController extends Controller
{
    public function getAuth(){
        if(Auth::check()) Auth::logout();
        return Socialite::driver('twitter')->redirect();
    }

    public function authCallback(){
        try{
            $user = Socialite::driver('twitter')->user();
        }catch (Exception $e){
            return redirect(route('login'));
        }

        // 登録ユーザが見つからない場合、システムから弾き出す
        $authUser = $this->findUser($user);
        if(is_null($authUser)){
            return view('invalid')->with('msg',"ログインに失敗しました。合同誌の参加者ではないか、参加表明時からTwitterIDが変更されている可能性があります。");
        }

        Auth::login($authUser,true);

        return redirect()->route('users.index');
    }


    public function findUser($twitterUser){

        $authUser = User::where('twitter_id',$twitterUser->nickname)->first();

        if($authUser){
            return $authUser;
        }

        return null;
    }

    /**
     * システムからログアウトします
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }


    public function __construct(){
        $this->middleware('guest')->except('logout');
    }


}
