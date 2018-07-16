<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlutterApp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $app = request()->flutter_app;

        return auth()->check() && auth()->user()->owns($app);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $app = request()->flutter_app;

        return [
            'title' => 'required|unique:flutter_apps,title,' . $app->id . ',id',
            'screenshot1_url' => 'required|url',
            'short_description' => 'required|max:140',
            'long_description' => 'required',
        ];
    }
}