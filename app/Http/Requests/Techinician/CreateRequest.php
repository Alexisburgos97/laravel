<?php

namespace App\Http\Requests\Techinician;

use App\Rules\imageSize;
use App\Rules\ImageError;
use App\Rules\imageExtension;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email:filter|unique:users',
            'avatar' => ['file', new imageError, new imageExtension, new imageSize],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
