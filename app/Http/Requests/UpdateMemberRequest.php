<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'groupid' => 'required',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|between:11,13',
            'email' => 'required|email',
            'profile_pic' => 'file|image|max:2048',
        ];
    }
}
