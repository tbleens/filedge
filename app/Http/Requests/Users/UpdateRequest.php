<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        $idUser = request()->idUpdate;
        return [
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email','max:100', Rule::unique('App\Models\User', 'email')->where(function ($query) {
                return $query->where('id', '!=', request()->idUpdate);
            })],
            'role' => ['required', 'integer']
        ];
    }
}
