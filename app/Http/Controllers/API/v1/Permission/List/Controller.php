<?php

namespace App\Http\Controllers\API\v1\Permission\List;

use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Action\PermissionListAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly PermissionListAction $permissionListAction,
        private readonly JsonResponseFactory  $jsonResponseFactory,
        private readonly OutputBuilder        $outputBuilder
    ) {}

    public function run(): JsonResponse
    {
        try {
            $permissions = $this->permissionListAction->run();
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'Permission list',
            $this->outputBuilder->build($permissions)
        );
    }
}
