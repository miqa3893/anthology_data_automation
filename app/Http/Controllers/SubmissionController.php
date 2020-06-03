<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function submitData(Request $request){
        return view('complete');
    }
}
