<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcribeRequest extends FormRequest
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
            'email_address' => ['string', 'email', 'max:191'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email_address.required' => 'Kindly provide your email address!',
            'email_address.email' => 'Kindly provide a valid email address',
            'email_address.max' => 'Email address shouldn\'t exceed 191 character'
        ];
    }
}
