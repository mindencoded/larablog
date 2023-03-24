<?php

namespace App\Http\Requests;

use App\CustomUrl;
use Illuminate\Foundation\Http\FormRequest;

class CustomFormRequest extends FormRequest
{
    public function url_clean() {
        $url_clean = $this->get('url_clean');

        if($url_clean == '') {
            $url_clean =  $this->get('title');
        }

        $url_clean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($url_clean), '-', true);

        $this->merge(['url_clean' => $url_clean]);
    }
}
