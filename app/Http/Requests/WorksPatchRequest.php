<?php

namespace App\Http\Requests;

use App\Rules\ImgDpi;
use App\Rules\ImgCheck;
use App\Rules\ImgWidth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class WorksPatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','max:64'],       //作品タイトル
            'comment' => ['required','max:256'],    //感想
            'characters' => 'required',         //キャラクター
            'years' => 'required',              //年度
            'work' => [
                'mimes:jpeg,jpg,png',
                'dimensions:min_width='.Config::get('utils.minWidth').',min_height='.Config::get('utils.minHeight').',max_width='.Config::get('utils.maxWidth').',max_height='.config::get('utils.maxHeight')],              //作品
            'graffito' => 'mimes:jpeg,jpg,png'                          //寄せ書き
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '作品タイトルは必須です。',       //作品タイトル
            'title.max' => '64字以内で入力してください。',
            'comment.required' => '感想は必須です。',       //作品タイトル
            'comment.max' => '256字以内で入力してください。',
            'characters' => '使用したキャラクターを1人以上選択してください。',         //キャラクター
            'years' => '使用した年度を1つ以上選択してください。',              //年度
            'work.mimes' => 'アップロードできるファイルは「jpg」「png」のみです。',
            'work.dimensions' => 'アップロードできるサイズが異なります。',
            'graffito.mimes' => 'アップロードできるファイルは「jpg」「png」のみです。' //寄せ書き
        ];
    }
}
