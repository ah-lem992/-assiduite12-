<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class seanceRequest extends FormRequest
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
            'cour_id'=> 'required',
            'type'=> 'required',
            'prof_id'=> 'required',
            'salle_id'=> 'required',
            'day'=> 'required',
            'start_time'=> 'required',
            'end_time'=> 'required',
            'profs_ids[]'=>"sometimes|array",

        ];
    }
}
