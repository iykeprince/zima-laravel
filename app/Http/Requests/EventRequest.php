<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_name' => ['required', 'string', 'max:100'],
            'event_start_date' => ['required', 'string'],
            'event_end_date' => ['required', 'string'],
            'event_start_time' => ['required', 'string'],
            'event_end_time' => ['required', 'string'],
            'event_description' => ['required'],
            'event_venue' => ['required', 'string', 'max:150'],
            'organiser_name' => ['required', 'string', 'max:100'],
            'organiser_email' => ['required', 'string', 'max:100', 'email'],
            'organiser_phone_number' => ['required', 'string', 'max:100'],
            'event_cover_image' => ['required', 'max:2048']

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
            'event_name.required' => 'Kindly provide an event name!',
            'event_start_date.required' => 'Kindly provide a valid date!',
            'event_end_date.required' => 'Kindly provide a valid date!',
            'event_start_time.required' => 'Kindly provide a valid time!',
            'event_end_time.required' => 'Kindly provide a valid time!',
            'event_description.required' => 'Kindly describe the event!',
            'event_venue.required' => 'Kindly provide venue for the event!',
            'organiser_name.required' => 'Kindly provide full name of the organiser!',
            'organiser_email.required' => 'Kindly provide email address of the organiser!',
            'organiser_phone_number.required' => 'Kindly provide phone number of the organiser!',
            'event_cover_image.required' => 'Kindly upload the cover image for the event!',

            //other validations
            'organiser_email.email' => 'Kindly provide a valid email address!',
            'event_name.max' => 'Event name shouldn\'t exceed 100 characters!',
            'event_venue.max' => 'Event venue shouldn\'t exceed 150 characters!',
            'organiser_name.max' => 'Organiser name shouldn\'t exceed 100 characters!',
            'organiser_email.max' => 'Organiser email address shouldn\'t exceed 100 characters!',
            'organiser_phone_number.max' => 'Organiser phone number shouldn\'t exceed 100 characters!',
            'event_cover_image.mimes' => 'Invalid image format! Kindly upload another!',
            'event_cover_image.max' => 'Uploaded cover image size is more than 2mb!',
        ];
    }
}
