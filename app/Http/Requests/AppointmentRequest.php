<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'contact' => 'required',
            'date' => 'date_format:"Y-m-d"|required',
            'start_time' => 'required|date_format:H:i:s',
            'finish_time' => 'date_format:H:i:s',
        ];
    }
}
