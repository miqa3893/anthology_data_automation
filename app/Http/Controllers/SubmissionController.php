<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use Auth;
use Config;
use Exception;
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

        // ユーザ情報を取得
        $user = User::where('id','=',Auth::id())->first();

        // Statuses（提出状況）にInsertするデータを作成
        $status = new Status();
        try{
            $status->create(array(
                'twitter_id' => $user->twitter_id,
                'submit_status' => '1',
                'selling_enabled' => $request->get('sellEnabledValue')
            ));
        }catch(Exception $exception){
            Log::error("Statusesデータベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
            return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
        }


        return view('complete');
    }
}
