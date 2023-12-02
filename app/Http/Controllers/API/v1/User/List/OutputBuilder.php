<?php

namespace App\Http\Controllers\API\v1\User\List;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OutputBuilder
{
    public function build(LengthAwarePaginator $users): array
    {
        $dtoList = [];

        /** @var User $user */
        foreach ($users as $user) {
            $dtoList[] = [
                'id'         => $user->id,
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'email'      => $user->email,
                'avatar'     => $user->avatar,
            ];
        }

        return $dtoList;
    }
}
