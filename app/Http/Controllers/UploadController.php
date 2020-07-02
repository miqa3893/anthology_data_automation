<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorksUploadRequest;
use App\Work;
use Auth;
use App\Util\DataConvertUtil;

class UploadController extends Controller
{

    // GET
    public function index(){
        if(Auth::check() && !DataConvertUtil::existsWork(Auth::user())){
            return view('submit');
        }else{
            return view('user.badrequest')->with(['title'=>"すでにデータが提出されているようです。。。",'msg' => "データの修正等は「提出データ確認・修正」からお願いします。"]);
        }
    }

    public function confirm(WorksUploadRequest $request){
        if(!Auth::check()){
            return redirect()->route('index');
        }

        // 作品ファイルをローカルに保存
        $work = $request->file('work');
        $work->storeAs('public/temp_works/',$work->getClientOriginalName());

        // 寄せ書きファイルがあったらローカルに保存
        if($request->has('graffito')){
            $graffito = $request->file('graffito');
            $graffitoName = $graffito->getClientOriginalName();
            $graffito->storeAs('public/temp_graffiti/',$graffitoName);
        }else{
            $graffitoName = 'データなし';
        }

        $inputData = array(
            'workFileName' => $work->getClientOriginalName(),
            'graffitoFileName' => $graffitoName,
            'title' => $request->get('title'),
            'comment' => $request->get('comment'),
            'characters' => DataConvertUtil::toCharacter($request->get('characters')),
            'charactersSum' => DataConvertUtil::sumCode($request->get('characters')),
            'yearsSum' => DataConvertUtil::sumCode($request->get('years')),
            'years' => DataConvertUtil::toYear($request->get('years')),
            'workName' => $request->file('work')->getClientOriginalName(),
            'sellEnabled' => $request->get('sellEnabled')==1 ? "はい" : "いいえ",
            'sellEnabledValue' => $request->get('sellEnabled'),
            'graffitoName' => $graffitoName,
        );

        return view('confirm')->with('data',$inputData);
    }
}
