<?php

namespace App\Http\Controllers;

use App\Graffito;
use App\Http\Requests\WorksPatchRequest;
use App\Status;
use App\User;
use App\Util\DataConvertUtil;
use App\Work;
use Auth;
use Config;
use Exception;
use Http;
use Illuminate\Http\Request;
use Log;
use Storage;

class UserController extends Controller
{
    /**
     * ユーザページを表示します。
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.mypage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * ユーザの提出データを検索し、表示します。
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if(!DataConvertUtil::existsWork(Auth::user())) return view('user.sorry')->with(['title'=>"まだデータが提出されていないようです。。。",'msg' => "データの提出は「作品提出」からお願いします。"]);

        //ユーザの提出データを取得する
        $workData = Work::find($id);
        $graffitoData = Graffito::find($id);
        $status = Status::find($id);

        $inputData = array(
            'title' => $workData['work_title'],
            'comment' => $workData['comment'],
            'workName'=> $workData['work_name'],
            'workPath'=> $workData['work_path'],
            'graffitoPath'=> is_null($graffitoData['graffito_path'])==true ? "データなし" : $graffitoData['graffito_path'],
            'characters' => DataConvertUtil::toCharacterWithSum($workData['character_code']),
            'years' => DataConvertUtil::toYearWithSum($workData['year_code']),
            'sellEnabled' => $workData['character_code']==1 ? "はい" : "いいえ",
            'sellEnabledValue' => $status['selling_enabled'],
        );

        //提出内容ビューを返却する
        return view('user.view')->with('data',$inputData);
    }

    /**
     * 提出データを修正します。
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //ユーザの提出データを取得する
        $workData = Work::find($id);
        $status = Status::find($id);

        $defaultData = array(
            'title' => $workData['work_title'],
            'comment' => $workData['comment'],
            'characters' => DataConvertUtil::toArrayForCharacter($workData['character_code']),
            'years' => DataConvertUtil::toArrayForYear($workData['year_code']),
            'sellEnabled' => $status['selling_enabled'],
        );

        return view('user.fix')->with('defaultData',$defaultData);
    }

    /**
     * 提出データの修正を更新します。
     *
     * @param WorksPatchRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(WorksPatchRequest $request, $id)
    {
        // ユーザ情報を取得
        $user = User::find(Auth::id());

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
            $workPath = null;

            //作品ファイルが更新されているなら
            if($request->has('work')) {
                Storage::disk('s3')->put($projectPath . '_works/' .  $request->file('work')->getClientOriginalName(), $request->file('work'), 'public');
                $workPath = Storage::disk('s3')->url($projectPath . '_works/' . $request->file('work')->getClientOriginalName());
            }

            // Statuses（提出状況）とWorks（提出データ）、graffiti（寄せ書きデータ）にUpdateするデータを取得
            $status = Status::find($id);
            $works = Work::find($id);

            //提出状況（更新）
            $status->submit_status = 2;
            $status->selling_enabled = $request->has('sellEnabled') ? 1 : 0;

            //提出データ(更新)
            $works->work_no = $works->work_no + 1;
            if(!is_null($workPath)){
                $works->work_path = $workPath;
            }
            $works->work_title = $request->get('title');
            $works->comment = $request->get('comment');
            $works->character_code = DataConvertUtil::sumCode($request->get('characters'));
            $works->year_code = DataConvertUtil::sumCode($request->get('years'));
            if(!is_null($workPath)) $works->work_name = $request->file('work')->getClientOriginalName();
            $works->save();

        }catch (Exception $exception){
            Log::error("データベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
            Log::error($exception->getMessage());
            return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
        }


        //寄せ書きファイルの処理は実行しない場合があるので下に書く
        if($request->has('graffito')){

            try{
                Storage::disk('s3')->put($projectPath.'_graffiti/'.$request->file('graffito')->getClientOriginalName(),$request->file('graffito'),'public');
                $graffitoPath = Storage::disk('s3')->url($projectPath.'_graffiti/'.$request->file('graffito')->getClientOriginalName());

                if(is_null(Graffito::find($id))){
                    $graffito = new Graffito();

                    //寄せ書きデータ
                    $graffito->create(array(
                        'twitter_id' => $user->twitter_id,
                        'graffito_no' => 1,
                        'graffito_path' => $graffitoPath,
                        'graffito_name' => $request->file('graffito')->getClientOriginalName(),
                    ));
                }else{
                    $graffito = Graffito::find($id);
                    $graffito->graffito_name = $request->file('graffito')->getClientOriginalName();
                    $graffito->graffito_no = $graffito->graffito_no+1;
                    $graffito->graffito_path = $graffitoPath;
                    $graffito->save();
                }

            }catch (Exception $exception){
                Log::error("データベース書き込みエラー　Twitter ID：".$user->twitter_id."\tHN：".$user->twitter_name);
                Log::error($exception->getMessage());
                return view('invalid')->with('msg',"内部的システムエラーが発生しました。");
            }
        }

        //IFTTTのWebhookを叩く
        $response = Http::post(config('utils.ifttt_fix_post_uri'),array(
            'value1' => $user->twitter_id,
            'value2' => $user->twitter_name,
            'value3' => $workPath
        ));


        return view('user.fixComplete');
    }
}
