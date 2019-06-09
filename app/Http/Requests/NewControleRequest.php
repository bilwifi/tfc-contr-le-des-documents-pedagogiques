<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewControleRequest extends FormRequest
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
        $array = [
            "idconseillers" => "required|exists:professeurs,idprofesseurs",
            "idprofesseurs" => "required|exists:professeurs",
        ];
        foreach (\App\Models\Ponderations_document::get() as $key => $value) {
            $array[] = [$value->slug => 'required|digits_between:0,'.$value->max]; 
        }
        return $array;
    }
}
