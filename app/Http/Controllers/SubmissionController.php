<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use Auth;
use Config;
use Illuminate\Http\Request;
use App\Util\DataConvertUtil;

class SubmissionController extends Controller
{
    // データ提出（DB書き込み）
    public function submit(Request $request){
        // キャラと年度を変換
        $magicalMiraiYear = Config::get('allYearSumCode');

        $year = $request->get('year') + 1;
        $character = $request->get('character') + 1;

        if(($year & $magicalMiraiYear)===$magicalMiraiYear){
            $year = 0;
        }

        if(($character & DataConvertUtil::ALL_CHARACTER_SUM)===DataConvertUtil::ALL_CHARACTER_SUM){
            $character = 0;
        }

        $user = User::where('id','=',Auth::id())->first();
        dd($user);

        //Insertするデータを作成
        $status = new Status();
        $status->create(array(
            'twitter_id' => $user->twitter_id,
        ));


        return view('complete');
    }
}
