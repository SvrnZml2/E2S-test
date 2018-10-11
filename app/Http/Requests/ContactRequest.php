<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //alpha = accepte que des caractères alphabétiques
            'nom' => 'required|min:5|max:20|alpha',
            //min = nombre minimum de caractères
            'structure' => 'required|min:3|max:20|string',
            //required = valeur requise donc le champ ne doit pas être vide
            'objet' => 'required|string',
            //email = la valeur doit être une adresse email valide.
            'email' => 'required|email',
            'texte' => 'required|max:250', 
        ];
 
    }
}
