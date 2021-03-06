<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'abbr' => 'required|max:255',
            'locale' => 'required|max:255',
            'name' => 'required|max:255',
            'direction' => 'required|in:ltr,rtl',
            'active' => 'required|in:0,1',
        ];
    }
}
