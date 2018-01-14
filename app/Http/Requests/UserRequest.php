<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           // 'username'=>'required|unique:users',
            'password'=>'required',
            'repass'=>'same:password',
            'fullname'=>'required',

        ];
    }
    public function messages(){
        return [
           // 'username.required'=>'Bạn phải nhập username',
            //'username.unique'=>'Username đã tồn tại',
            'password.required'=>'Bạn phải nhập password',
            'repass.same'=>'Password không khớp ',
            'fullname.required'=>'Bạn phải nhập fullname',
        ];  
    }
}
