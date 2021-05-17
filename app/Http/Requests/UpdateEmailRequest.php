<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UpdateEmailRequest extends FormRequest
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
            'Name' => ['required', 'string', 'max:20'],
            'Email' => 'required|email|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'Name' => '名前',
            'Email' => 'メールアドレス',
        ];
    }

}
