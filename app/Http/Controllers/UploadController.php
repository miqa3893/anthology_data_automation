<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorksUploadRequest;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    // GET
    public function input(){
        return view('home');
    }

    // PATCH
    public function confirm(WorksUploadRequest $request){
        return view('confirm')->with($request);
    }
}
