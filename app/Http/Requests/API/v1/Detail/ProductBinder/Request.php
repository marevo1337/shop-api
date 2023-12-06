<?php

namespace App\Http\Requests\API\v1\Detail\ProductBinder;

use App\Http\Controllers\API\v1\Detail\ProductBinder\Dto\ProductBindDetailData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required'
        ];
    }

    public function getData(): ProductBindDetailData
    {
        return (new ProductBindDetailData())
            ->setValue($this->get('value'));
    }
}
