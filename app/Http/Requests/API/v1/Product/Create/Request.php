<?php

namespace App\Http\Requests\API\v1\Product\Create;

use App\Http\Controllers\API\v1\Product\Create\Dto\ProductCreateData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'               => 'required|min:2',
            'description'         => 'required|min:2',
            'alias'               => 'required|min:3',
            'product_category_id' => 'required|integer',
            'price'               => 'required|decimal:2',
        ];
    }

    public function getData(): ProductCreateData
    {
        return (new ProductCreateData())
            ->setTitle($this->get('title'))
            ->setDescription($this->get('description'))
            ->setAlias($this->get('alias'))
            ->setProductCategoryId($this->get('product_category_id'))
            ->setPrice($this->get('price'));
    }
}
