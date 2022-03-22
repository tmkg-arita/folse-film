<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmStoreRequest extends FormRequest
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

        // 監督名に関してのバリデーションを記述する！！
        //director_nameは手入力のform。DBに同じ監督名があればerrorになる仕様。
        return [
            'name' => 'required|string|max:20',
            'information' => 'required|string|max:1500',
            'movie_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'movie_time' => 'required|integer',
            'category' => 'required',
            'director_name' =>'max:20|unique:directors,director_name',
            'director_age' =>'nullable|integer',
            'director_gender' =>'nullable|',

        ];
    }

    public function messages()
    {
       return [
        'required'=>'入力して下さい。',
        'name.max'=>'名前は20字以内で入力してください。',
        'director_name.nuique'=>'この監督は存在します。selectで選択して下さい。',
        'director_name.max'=>'名前は20字以内で入力してください。',
        'information.max'=>'あらすじは10文字以上1500文字以内で入力して下さい。',
        'movie_image.image' =>'指定されたファイルが画像ではありません',
        'movie_image.mimes' =>'指定された拡張子(jpg/jpeg/png)ではありません',
        'movie_image.max' =>'ファイルサイズは2MB以内にして下さい。',
        'movie_time.integer'=>'上映時間は数字で入力して下さい。',
        'director_age.integer' => '年齢は数字で入力して下さい。'
       ];
    }
}
