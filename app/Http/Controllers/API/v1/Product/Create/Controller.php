<?php

namespace App\Http\Controllers\API\v1\Product\Create;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\Product\Create\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Action\ProductCreateAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductCreateAction $productCreateAction,
        private readonly JsonResponseFactory $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $this->productCreateAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product created');
    }
}
