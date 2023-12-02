<?php

namespace App\Http\Requests\API\v1\Permission\Create;

use App\Http\Controllers\API\v1\Permission\Create\ValueObject\PermissionCreateData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    public function getData(): PermissionCreateData
    {
        return new PermissionCreateData(
            $this->get('name'),
            $this->get('description')
        );
    }
}
