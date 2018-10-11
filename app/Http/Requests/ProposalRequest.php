<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
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
            'companieId' => 'required|numeric',
            'type' => 'required|alpha',
            'titre' => 'required|string|max:180',
            'comp' => 'required|numeric',
            'description' => 'required|string',
            'debut' => 'required|date',
            'fin' => 'required|date',
            'archivage' => 'required|date',
            'frequence' => 'required|numeric|max:1',
            'heure' => 'required|numeric|max:744|min:1',
            'besoin' => 'required|numeric|max:1',
            'localisation' => 'required|string'
        ];
    }
}
