<?php

namespace App\Http\Requests;

use App\Rules\checkLinkExits;
use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
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
            'author_id' => [
                'required',
                new checkLinkExits()
            ]

        ];
    }
}
