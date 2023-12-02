<?php

namespace App\Http\Controllers\API\v1\Auth\Login;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\Auth\Login\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Auth\Action\UserLoginAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly UserLoginAction     $userLoginAction,
        private readonly JsonResponseFactory $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $jwt = $this->userLoginAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'Successfully login',
            [
                'jwt'        => $jwt->getToken(),
                'expired_at' => $jwt->getExpiredAt(),
            ]
        );
    }
}
