<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientProfileRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:50'],
            'contact_address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'zipcode' => ['string', 'max:50'],
            'dob' => ['required', 'string', 'max:50']
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
            'first_name.required' => 'Kindly provide your first name!',
            'last_name.required' => 'Kindly provide your last name!',
            'phone_number.required' => 'Kindly provide a valid phone number!',
            'contact_address.required' => 'Kindly provide your contact address!',
            'state.required' => 'Kindly provide choice of state!',
            'country.required' => 'Kindly provide choice of country!',
            'dob.required' => 'Kindly provide your date of birth!',

            'first_name.max' => 'First name shouldn\'t exceed 255 character',
            'last_name.max' => 'Last name shouldn\'t exceed 255 character',
            'phone_number.max' => 'Phone number shouldn\'t exceed 50 character',
            'contact_address.max' => 'Contact address shouldn\'t exceed 255 character',
            'state.max' => 'Choice of city/state shouldn\'t exceed 100 character',
            'country.max' => 'Choice of country shouldn\'t exceed 100 character',
            'zipcode.max' => 'Choice of zipcode shouldn\'t exceed 50 character',
            'dob.max' => 'Date of birth shouldn\'t exceed 50 character',

        ];
    }
}
