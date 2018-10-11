<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $exp = bcpow('10', '14', 0)-1;

        return [
            'structure' => 'bail|required|min:3|max:20|string',
            'statut' => 'bail|required|min:3|max:20|string',
            'budget' => 'bail|required|numeric',
            'siret' => 'bail|required|max:'.$exp.'|numeric',
            'rue' => 'bail|required|min:3|max:50|string',
            'postal' => 'bail|required|max:100000|numeric',
            'ville' => 'bail|required|min:3|max:20|string',
            'nom' => 'bail|required|min:3|max:20|string',
            'prenom' => 'bail|required|min:3|max:20|string',
            'telephone' => 'bail|required|min:11|max:0989999999|numeric',
            'email' => 'bail|required|email|unique:users,email',
            'url' => 'url',
            'etp' => 'bail|required|numeric',
            'finabo' => 'numeric'
        ];
    }
}
