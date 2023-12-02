<?php

namespace App\Http\Controllers\API\v1\ProductCategory\Create;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\ProductCategory\Create\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Action\ProductCategoryCreateAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductCategoryCreateAction $productCategoryCreateAction,
        private readonly JsonResponseFactory         $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $this->productCategoryCreateAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product category created');
    }
}
