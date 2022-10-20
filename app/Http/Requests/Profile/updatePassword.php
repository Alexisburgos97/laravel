<?php

namespace App\Http\Requests\Profile;

use App\Rules\ImageError;
use App\Rules\imageExtension;
use App\Rules\imageSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updatePassword extends FormRequest
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
            'current_password' => 'password',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
