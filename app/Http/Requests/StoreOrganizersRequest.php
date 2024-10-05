<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizersRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:organizers,name',
            'description' => 'required|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ];
    }

    public function params(): array
    {
        return [
            'name.required' => 'The organizer name is required.',
            'name.string' => 'The organizer name must be a string.',
            'name.max' => 'The organizer name may not be greater than 255 characters.',
            'name.unique' => 'This organizer name has already been taken.',

            'description.required' => 'The organizer description is required.',
            'description.string' => 'The description must be a string.',

            'facebook_link.url' => 'The Facebook link must be a valid URL.',

            'x_link.url' => 'The X link must be a valid URL.',

            'website_link.url' => 'The website link must be a valid URL.',
        ];
    }
}
