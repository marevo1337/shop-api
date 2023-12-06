<?php

namespace App\Http\Requests\API\v1\Detail\Create;

use App\Http\Controllers\API\v1\Detail\Create\Dto\DetailCreateData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
        ];
    }

    public function getData(): DetailCreateData
    {
        return (new DetailCreateData())
            ->setTitle($this->get('title'))
            ->setDescription($this->get('description'))
            ->setUnit($this->get('unit'));
    }
}
