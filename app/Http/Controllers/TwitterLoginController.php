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

        //すでにworksテーブルにデータがある（提出済み）のユーザは弾く
        if($this->existsWork($authUser)){
            return view('invalid')->with('msg',"すでにデータが提出されている可能性があります。");
        }

        Auth::login($authUser,true);

        $data = array('twitterName' => $authUser->twitter_name);

        return redirect()->route('home',$data);
    }

    public function findUser($twitterUser){

        $authUser = User::where('twitter_id',$twitterUser->nickname)->first();

        if($authUser){
            return $authUser;
        }

        return null;
    }

    /**
     * ユーザの作品がすでに提出済みかどうかを調べます
     * @param User $twitterUser
     * @return bool
     */
    public function existsWork($twitterUser){
        $twitterId = $twitterUser->twitter_id;
        $works = Work::where('twitter_id','=',$twitterId);

        if($works->count() != 0){
            return true;
        }

        return false;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }


}
