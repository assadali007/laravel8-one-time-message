<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeMessageRequest extends FormRequest
{


    public function rules()
    {
        return [
            'text_from'=> 'required|email|max:50',
             'text_to' => 'required|email|max:50',
              'text_message' => 'required|max:250'
        ];
    }
    public function messages()
    {
        return [
            'text_from.required' => 'From is required',
             'text_from.email'   => 'From must be a valid email',
              'text_from.max'    => 'From must have less than 50 chars',
              'text_to.required' => 'To is required',
             'text_to.email'   => 'To must be a valid email',
              'text_to.max'    => 'To must have less than 50 chars',
              'text_message.required' => 'Message is required',
               'text_message.max' => 'Message must have less than 250 character'


        ];
    }
}
