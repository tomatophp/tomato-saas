<?php

namespace TomatoPHP\TomatoSaas\Http\Requests\Sync;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SyncStoreRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'username' => [
                'required',
                'regex:/^[a-zA-Z]*$/',
                'min:6',
                Rule::unique('accounts', 'username')
            ],
            'password' => 'required|min:6|confirmed|string|max:255',
            'store' => 'required|string|max:255',
        ];
    }
}
