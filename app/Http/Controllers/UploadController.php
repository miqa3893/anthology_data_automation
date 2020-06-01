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
        if($request->has('graffito')){
            $graffito = $request->file('graffito')->getClientOriginalName();
        }else{
            $graffito = 'データなし';
        }

        $inputData = array(
            'title' => $request->get('title'),
            'comment' => $request->get('comment'),
            'characters' => DataConvertUtil::toCharacter($request->get('characters')),
            'years' => DataConvertUtil::toYear($request->get('years')),
            'work' => $request->file('work')->getClientOriginalName(),
            'graffito' => $graffito,
        );

        $hash = array(
            'inputs' => $inputData,
            'raw' => $request->all(),
        );

        return view('confirm')->with('data',$hash);
    }
}
