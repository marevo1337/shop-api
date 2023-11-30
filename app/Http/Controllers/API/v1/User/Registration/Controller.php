<?php

namespace App\Http\Controllers\API\v1\User\Registration;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\User\Post\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\User\Action\UserRegistrationAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly UserRegistrationAction $userRegistrationAction,
        private readonly JsonResponseFactory    $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $this->userRegistrationAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success();
    }
}
