<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'booking_url' => 'nullable|url',
            'tags' => 'required|string|regex:/^(?!,)(?!.*,,)(?!.*,$).+$/',
            'organizer_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:event_categories,id',
        ];
    }

    public function params(): array
    {
        return [
            'title.required' => 'The event title is required.',
            'title.string' => 'The event title must be a string.',
            'title.max' => 'The event title may not be greater than 255 characters.',

            'venue.required' => 'The venue is required.',
            'venue.string' => 'The venue must be a string.',
            'venue.max' => 'The venue may not be greater than 255 characters.',

            'date.required' => 'The event date is required.',
            'date.date' => 'The event date is not a valid date.',

            'start_time.required' => 'The event start time is required.',
            'start_time.date_format' => 'The event start time must be in the format HH:MM.',

            'description.required' => 'The event description is required.',
            'description.string' => 'The event description must be a string.',

            'booking_url.url' => 'The booking URL must be a valid URL.',

            'organizer_id.required' => 'The organizer is required.',
            'organizer_id.exists' => 'The selected organizer is invalid.',

            'event_category_id.required' => 'The event category is required.',
            'event_category_id.exists' => 'The selected event category is invalid.',
        ];
    }
}
