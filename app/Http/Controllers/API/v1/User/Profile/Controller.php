<?php

namespace App\Http\Controllers\API\v1\User\Profile;

use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\User\Action\UserProfileAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly UserProfileAction   $userProfileAction,
        private readonly JsonResponseFactory $jsonResponseFactory,
        private readonly OutputService       $outputService
    ) {}

    public function run(): JsonResponse
    {
        try {
            $user = $this->userProfileAction->run();
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'Profile',
            $this->outputService->build($user),
        );
    }
}
