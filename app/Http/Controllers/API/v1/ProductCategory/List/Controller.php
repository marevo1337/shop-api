<?php

namespace App\Http\Controllers\API\v1\ProductCategory\List;

use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Action\ProductCategoryListAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductCategoryListAction $productCategoryListAction,
        private readonly JsonResponseFactory       $jsonResponseFactory,
        private readonly OutputService             $outputService
    ) {}

    public function run(): JsonResponse
    {
        try {
            $productCategories = $this->productCategoryListAction->run();
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success(
            'Product categories list',
            [
                'categories' => $this->outputService->build($productCategories),
            ]
        );
    }
}
