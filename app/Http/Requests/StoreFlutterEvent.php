<?php

namespace App\Http\Requests;

use App\Rules\HasVariable;
use App\Rules\ExternalLink;
use Illuminate\Foundation\Http\FormRequest;

class StoreFlutterEvent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'event_name' => 'required',
            'event_url' => 'required|unique:flutter_events',
            'slug' => 'required|unique:flutter_events',
            'event_date' => 'required|date',
            'address' => 'required',
            'terms' => 'required',
            'banner' => [
                new HasVariable('$event'),
                'required',
            ],
        ];

        return $rules;
    }
}
