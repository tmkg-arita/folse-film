<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserEditRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            // idnoreで現在のidのメールの重複は除外している。
            'email' =>['required','email','max:255', Rule::unique('users')->ignore(Auth::id())],
            // user_imageはnullを登録しデフォルトの画像を表示する。
            'user_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            //informationはnullを許容する。
            'information' => 'nullable|string|max:1500',
        ];
    }

    public function messages()
    {
       return [
        'required'=>'入力して下さい。',
        'name.max'=>'名前は20字以内で入力してください。',
        'email'=>'メールアドレスの@がありません',
        'unique'=>'そのアドレスは使われています。',
        'information.max'=>'1500文字以内で入力して下さい。',
        'user_image' =>'指定されたファイルが画像ではありません',
        'user_image' =>'指定された拡張子(jpg/jpeg/png)ではありません',
        'user_image.max' =>'ファイルサイズは2MB以内にして下さい。',
        'movie_time.integer'=>'上映時間は数字で入力して下さい。',
       ];
    }
}
