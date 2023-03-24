<?php

namespace App\Http\Requests;

class StoreCategoryPost extends CustomFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'title' => 'required|min:5|max:500',
            'url_clean' => 'nullable|max:500|unique:categories'
        ];
    }

    public function prepareForValidation()
    {
        $this->url_clean();
    }
}
