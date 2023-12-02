<?php

namespace App\Http\Requests\API\v1\User\Registration;

use App\Http\Controllers\API\v1\User\Registration\Dto\UserRegistrationData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:2',
            'last_name'  => 'min:2',
            'email'      => 'required|email',
            'password'   => 'required|min:8'
        ];
    }

    public function getData(): UserRegistrationData
    {
        return (new UserRegistrationData())
            ->setFirstName($this->get('first_name'))
            ->setLastName($this->get('last_name'))
            ->setEmail($this->get('email'))
            ->setPassword($this->get('password'));
    }
}
