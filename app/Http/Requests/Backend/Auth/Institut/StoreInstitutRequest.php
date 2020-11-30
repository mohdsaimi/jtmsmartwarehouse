<?php

namespace App\Http\Requests\Backend\Auth\Institut;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreRoleRequest.
 */
class StoreInstitutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /* 'nama_institut' => ['required', Rule::unique('instituts')], */
            'nama_institut' => ['required'],
        ];
    }
}
