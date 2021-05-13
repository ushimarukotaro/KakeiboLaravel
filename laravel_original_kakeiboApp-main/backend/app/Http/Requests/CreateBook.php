<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBook extends FormRequest
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
            //
            'year' => ['required'],
            'month' => ['required'],
            'date' => ['required'],
            'inout' => ['required'],
            'category_id' => ['required'],
            'content' => ['required','max:50'],
            'amount' => ['required'],
            'memo' => ['max:50']
        ];
    }

    public function attributes()
    {
        return [
            'year' => '年',
            'month' => '月',
            'date' => '日',
            'inout' => '区分',
            'category_id' => 'カテゴリー',
            'content' => '内容',
            'amount' => '金額',
            'memo' => 'メモ',
        ];
    }
}
