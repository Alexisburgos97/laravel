<?php

namespace App\Http\Requests\Profile;

use App\Rules\ImageError;
use App\Rules\imageExtension;
use App\Rules\imageSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class updatePersonalData extends FormRequest
{

    protected $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'email' => ['required', 'email:filter', Rule::unique('users')->ignore(auth()->user()->id)],
            'avatar' => ['file', new imageError, new imageExtension, new imageSize],
        ];
    }
}
