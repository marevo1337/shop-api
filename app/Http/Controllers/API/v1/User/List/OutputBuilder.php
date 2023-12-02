<?php

namespace App\Http\Controllers\API\v1\User\List;

use App\Models\User;
use App\UI\User\UserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OutputBuilder
{
    public function __construct(
        private readonly UserService $userService
    ) {}

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
                'status'     => $this->userService->getStatusLabel($user->status),
                'permission' => $user->permission->name,
            ];
        }

        return [
            'users'     => $dtoList,
            'next_page' => $users->nextPageUrl(),
        ];
    }
}
