<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostPut extends FormRequest
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
            "title" => "required|min:5|max:500",
            "url_clean" => "nullable|max:500|unique:posts,url_clean," . $this->route('post')->id,
            "content" => "required|min:5",
            'category_id' => 'required',
            'posted' => 'required|in:yes,not',
            'image' => 'nullable|mimes:jpeg,bmp,png|max:10240', //10Mb
        ];
    }
}
