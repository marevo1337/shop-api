<?php

namespace App\Http\Requests\API\v1\User\List;

use App\Http\Controllers\API\v1\User\List\Dto\UserSearchData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function getData(): UserSearchData
    {
        $statuses    = $this->get('statuses')    ? explode(',', $this->get('statuses'))    : null;
        $permissions = $this->get('permissions') ? explode(',', $this->get('permissions')) : null;

        return (new UserSearchData())
            ->setFirstName($this->get('first_name'))
            ->setLastName($this->get('last_name'))
            ->setEmail($this->get('email'))
            ->setStatuses($statuses)
            ->setPermissionIds($permissions);
    }
}
