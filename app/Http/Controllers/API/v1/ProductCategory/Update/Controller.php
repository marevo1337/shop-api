<?php

namespace App\Http\Controllers\API\v1\ProductCategory\Update;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\ProductCategory\Update\Request;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Action\ProductCategoryUpdateAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductCategoryUpdateAction $productCategoryUpdateAction,
        private readonly JsonResponseFactory         $jsonResponseFactory
    ) {}

    public function run(int $id, Request $request): JsonResponse
    {
        $data = ($request->getData())->setId($id);

        try {
            $this->productCategoryUpdateAction->run($data);
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product category updated');
    }
}
