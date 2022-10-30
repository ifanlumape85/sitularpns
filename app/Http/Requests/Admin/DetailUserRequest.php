<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DetailUserRequest extends FormRequest
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
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'id_skpd' => 'required|integer|exists:skpd,id',
            'id_golongan' => 'required|integer|exists:golongan,id',
        ];
    }
}
