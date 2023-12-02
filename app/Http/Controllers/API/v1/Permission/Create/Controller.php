<?php

namespace App\Http\Controllers\API\v1\Permission\Create;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\Permission\Create\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Action\PermissionCreateAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly PermissionCreateAction $permissionCreateAction,
        private readonly JsonResponseFactory    $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $this->permissionCreateAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Permission created');
    }
}
