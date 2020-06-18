<?php

namespace App\Http\Controllers;

use App\Graffito;
use App\Status;
use App\User;
use App\Work;
use Auth;
use Config;
use Exception;
use Http;
use Illuminate\Http\Request;
use App\Util\DataConvertUtil;
use Log;
use Storage;

class SubmissionController extends Controller
{
    // データ提出（DB書き込み）
    public function submit(Request $request){
        if(!Auth::check()){
            return redirect()->route('index');
        }

        // ユーザ情報を取得
        $user = User::where('id','=',Auth::id())->first();

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

        $projectPath = Config::get('utils.s3Folder');

        try{
            // ローカルからデータファイルを読み出す
            $workImage = Storage::get('/public/temp_works/'.$request->get('workFileName'));

            Storage::disk('s3')->put($projectPath.'_works/'.$request->get('workFileName'),$workImage,'public');
            $workPath = Storage::disk('s3')->url($projectPath.'_works/'.$request->get('workFileName'));

            // Statuses（提出状況）とWorks（提出データ）、graffiti（寄せ書きデータ）にInsertするデータを作成
            $status = new Status();
            $works = new Work();

            //提出状況
            $status->create(array(
                'twitter_id' => $user->twitter_id,
                'submit_status' => '1',
                'selling_enabled' => $request->has('sellEnabled') ? 1 : 0
            ));

            //提出データ
            $works->create(array(
                'twitter_id' => $user->twitter_id,                  //提出者のTwitterID
                'work_no' => 1,                                     //保存回数
                'work_path' => $workPath,                           //S3の保存パス
                'work_title' => $request->get('title'),         //タイトル
                'comment' => $request->get('comment'),          //感想
                'character_code' => $character,                      //キャラコード
                'year_code' => $year,                                //年コード
            ));
        }catch (Exception $exception){
            Log::error("データベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
            Log::error($exception->getMessage());
            return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
        }


        //寄せ書きファイルの処理は実行しない場合があるので下に書く
        if(Storage::exists('/public/temp_graffiti/'.$request->get('graffitoFileName'))){
            $graffitoImage = Storage::get('/public/temp_graffiti/'.$request->get('graffitoFileName'));

            try{
                Storage::disk('s3')->put($projectPath.'_graffiti/'.$request->get('graffitoFileName'),$graffitoImage,'public');
                $graffitoPath = Storage::disk('s3')->url($projectPath.'_graffiti/'.$request->get('graffitoFileName'));

                $graffito = new Graffito();

                //寄せ書きデータ
                $graffito->create(array(
                    'twitter_id' => $user->twitter_id,
                    'graffito_no' => 1,
                    'graffito_path' => $graffitoPath,
                ));

            }catch (Exception $exception){
                Log::error("データベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
                Log::error($exception->getMessage());
                return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
            }
        }

        //IFTTTのWebhookを叩く
        $response = Http::post(env('IFTTT_API_URL'),array(
            'value1' => $user->twitter_id,
            'value2' => $user->twitter_name,
            'value3' => $workPath
        ));


        return view('complete');
    }
}
