<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
        $rules = [];

        switch (request()->method()) {
            case 'POST':
                $rules = [
                    'location' => 'required|min:6',
                    'title' => 'alpha',
                    'description' => 'required|min:6'
                ];
                break;
            
            default:
                break;
        }

        return $rules;
    }
}
