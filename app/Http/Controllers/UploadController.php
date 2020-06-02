<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorksUploadRequest;
use Illuminate\Http\Request;
use App\Util\DataConvertUtil;

class UploadController extends Controller
{

    // GET
    public function input(){
        return view('home');
    }

    // PATCH
    public function confirm(WorksUploadRequest $request){
        //dd($request->all());
        $work = $request->file('work');
        $work->storeAs('public/temp_works/',$work->getClientOriginalName());

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
            'years' => DataConvertUtil::toYear($request->get('years')),
            'workName' => $request->file('work')->getClientOriginalName(),
            'graffitoName' => $graffitoName,
        );

        $hash = array(
            'inputs' => $inputData,
            'raw' => $request->all(),
        );

        return view('confirm')->with('data',$hash);
    }
}
