<?php

namespace App\Http\Controllers;

use App\Status;
use App\User;
use App\Work;
use Auth;
use Config;
use Exception;
use Illuminate\Http\Request;
use App\Util\DataConvertUtil;
use Log;

class SubmissionController extends Controller
{
    // データ提出（DB書き込み）
    public function submit(Request $request){
        if(!Auth::check()){
            return redirect()->route('index');
        }

        // キャラと年度を変換
        $magicalMiraiYear = Config::get('utils.allYearSumCode');

        $year = $request->get('year');
        $character = $request->get('character');

        if($year == $magicalMiraiYear){
            $year = 0;
        }

        if($character == DataConvertUtil::ALL_CHARACTER_SUM){
            $character = 0;
        }

        //todo: S3に保存する
        //todo: S3に保存したパスを取得する

        // ユーザ情報を取得
        $user = User::where('id','=',Auth::id())->first();

        // Statuses（提出状況）とWorks（提出データ）にInsertするデータを作成
        $status = new Status();
        $works = new Work();
        try{
            $status->create(array(
                'twitter_id' => $user->twitter_id,
                'submit_status' => '1',
                'selling_enabled' => $request->has('sellEnabled') ? 1 : 0
            ));

            $works->create(array(
                'twitter_id' => $user->twitter_id,                  //提出者のTwitterID
                'work_no' => 1,                                     //保存回数
                'work_path' => "",                                  //S3の保存パス
                'work_title' => $request->get('title'),         //タイトル
                'comment' => $request->get('comment'),          //感想
                'character_code' => $character,                      //キャラコード
                'year_code' => $year,                                //年コード
            ));
        }catch(Exception $exception){
            Log::error("データベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
            Log::error($exception->getMessage());
            return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
        }

        return view('complete');
    }
}
