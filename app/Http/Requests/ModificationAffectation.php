<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificationAffectation extends FormRequest
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

            'equipe' => 'required',
            'direction' => 'required',
            'etablissement' => 'required',
            'nom' => 'required',
            'matricule' => 'required',
            'affectation' => 'required',
            'statut' => 'required'


        ];
    }
}
