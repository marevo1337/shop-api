<?php

namespace App\Http\Requests\API\v1\Auth\Login;

use App\Http\Controllers\API\v1\Auth\Login\ValueObject\UserLoginData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required'
        ];
    }

    public function getData(): UserLoginData
    {
        return new UserLoginData($this->get('email'), $this->get('password'));
    }
}
