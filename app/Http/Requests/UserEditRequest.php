<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'user_image' => 'image|mimes:jpg,jpeg,png|max:2048',
                'information' => 'string|max:1500',

        ];
    }

    public function messages()
    {
       return [
        'required'=>'入力して下さい。',
        'name.max'=>'名前は20字以内で入力してください。',
        'information.max'=>'あらすじは10文字以上1500文字以内で入力して下さい。',
        'movie_image.image' =>'指定されたファイルが画像ではありません',
        'movie_image.mimes' =>'指定された拡張子(jpg/jpeg/png)ではありません',
        'movie_image.max' =>'ファイルサイズは2MB以内にして下さい。',
        'movie_time.integer'=>'上映時間は数字で入力して下さい。'
       ];
    }
}
