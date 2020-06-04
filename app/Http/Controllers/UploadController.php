<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorksUploadRequest;
use Auth;
use Illuminate\Http\Request;
use App\Util\DataConvertUtil;

class UploadController extends Controller
{

    // GET
    public function input(){

        //ログインしていなかったらindexにリダイレクト
        if(Auth::check()){
            return view('home');
        }else{
            return redirect()->route('index');
        }
    }

    // PATCH
    public function confirm(WorksUploadRequest $request){
        if(!Auth::check()){
            return redirect()->route('index');
        }

        // 作品ファイルをローカルに保存
        $work = $request->file('work');
        $work->storeAs('public/temp_works/',$work->getClientOriginalName());

        // 寄せ書きファイルがあったらローカルに保存
        if($request->has('graffito')){
            $graffito = $request->file('work');
            $graffitoName = $graffito->getClientOriginalName();
            $graffito->storeAs('public/temp_graffiti/',$graffitoName);
        }else{
            $graffitoName = 'データなし';
        }

        $inputData = array(
            'title' => $request->get('title'),
            'comment' => $request->get('comment'),
            'characters' => DataConvertUtil::toCharacter($request->get('characters')),
            'charactersSum' => $this->sumCode($request->get('characters')),
            'yearsSum' => $this->sumCode($request->get('years')),
            'years' => DataConvertUtil::toYear($request->get('years')),
            'workName' => $request->file('work')->getClientOriginalName(),
            'sellEnabled' => $request->get('sellEnabled')==1 ? "はい" : "いいえ",
            'sellEnabledValue' => $request->get('sellEnabled'),
            'graffitoName' => $graffitoName,
        );

        return view('confirm')->with('data',$inputData);
    }

    private function sumCode(array $codes){
        $sum = 0;
        foreach ($codes as $code){
            $sum += $code;
        }
        return $sum;
    }
}
