<?php

namespace App\Http\Controllers\API\v1\User\List;

use App\Http\Controllers\API\v1\User\List\Dto\UserSearchData;
use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\User\Action\UserListAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly UserListAction      $userListAction,
        private readonly JsonResponseFactory $jsonResponseFactory,
        private readonly OutputBuilder       $outputBuilder
    ) {}

    public function run(): JsonResponse
    {
        try {
            $users = $this->userListAction->run(new UserSearchData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->success($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'User list',
            [
                'users' => $this->outputBuilder->build($users),
            ]
        );
    }
}
