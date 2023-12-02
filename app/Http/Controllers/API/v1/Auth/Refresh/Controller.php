<?php

namespace App\Http\Controllers\API\v1\Auth\Refresh;

use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly AuthServiceInterface $authService,
        private readonly JsonResponseFactory  $jsonResponseFactory
    ) {}

    public function run(): JsonResponse
    {
        try {
            $jwt = $this->authService->refresh();
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'Refreshed',
            [
                'jwt'        => $jwt->getToken(),
                'expired_at' => $jwt->getExpiredAt(),
            ]
        );
    }
}
