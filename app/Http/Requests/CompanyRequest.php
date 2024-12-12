<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userId' => ['required', 'bigInteger'],
            'nameCompany' => ['required', 'string'],
            'nit' => ['required', 'string'],
            'numberEmployees' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'cellphone' => ['required', 'integer'],
            'whatsapp' => ['required', 'integer'],
            'legalRepresentative' => ['required', 'string'],
            'webSite' => ['required', 'string'],
            'typology_foreigner' => ['required', 'bigInteger'],
            'companyDescription' => ['required', 'string'],
            'contactEmail' => ['required', 'string'],
            'typePerson_foreigner' => ['required', 'bigInteger'],
            'sector_foreigner' => ['required', 'bigInteger'],
            'department_foreigner' => ['required', 'bigInteger'],
            'review_foreigner' => ['required', 'bigInteger'],
            'percent' => ['required', 'double']
        ];
    }
}
