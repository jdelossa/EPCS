<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest{

    protected $rules = [
        'time_selection'            => 'required',
        'physician_first_name'      => 'required',
        'physician_last_name'       => 'required',
        'physician_specialty'       => 'required',
        'physician_email'           => 'required|email'
    ];

    public function rules()
    {
        $rules = $this->rules;

        return $rules;
    }

    public function authorize()
    {
        return true;
    }

    public function forbiddenResponse()
    {
        return "create a response with a 404 error";
    }

}