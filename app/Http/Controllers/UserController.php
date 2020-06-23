<?php

namespace App\Http\Controllers;

use App\Graffito;
use App\Status;
use App\Util\DataConvertUtil;
use App\Work;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if(!DataConvertUtil::existsWork(Auth::user())) return view('user.badrequest')->with('msg',"まだデータが提出されていないようです。。。\n「作品提出」からデータの提出をお願いします。");

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

        //todo: 提出内容ビューを返却する
        return view('user.view')->with('data',$inputData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
