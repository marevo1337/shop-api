<?php

namespace App\Http\Requests\API\v1\ProductCategory\Create;

use App\Http\Controllers\API\v1\ProductCategory\Create\Dto\ProductCategoryCreateData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'alias' => 'required|min:3',
        ];
    }

    public function getData(): ProductCategoryCreateData
    {
        return (new ProductCategoryCreateData())
            ->setTitle($this->get('title'))
            ->setDescription($this->get('description'))
            ->setAlias($this->get('alias'));
    }
}
