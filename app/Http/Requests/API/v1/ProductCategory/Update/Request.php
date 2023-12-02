<?php

namespace App\Http\Requests\API\v1\ProductCategory\Update;

use App\Http\Controllers\API\v1\ProductCategory\Update\Dto\ProductCategoryUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
        ];
    }

    public function getData(): ProductCategoryUpdateData
    {
        return (new ProductCategoryUpdateData())
            ->setTitle($this->get('title'))
            ->setDescription($this->get('description'));
    }
}
