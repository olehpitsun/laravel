<?php

namespace App\Http\Requests;

class CardRegistrationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'myID' => 'bail|required|max:50',
            'donID' => 'bail|required|max:50',
            //'message' => 'bail|required|max:1000'
        ];
    }
}
