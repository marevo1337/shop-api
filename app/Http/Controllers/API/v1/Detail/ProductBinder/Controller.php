<?php

namespace App\Http\Controllers\API\v1\Detail\ProductBinder;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\Detail\ProductBinder\Request;
use App\ShopApi\Detail\Action\ProductBindDetailAction;
use App\ShopApi\Exception\RuntimeException;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductBindDetailAction $productBindDetailAction,
        private readonly JsonResponseFactory     $jsonResponseFactory
    ) {}

    public function run(int $productId, int $detailId, Request $request): JsonResponse
    {
        $data = ($request->getData())
            ->setProductId($productId)
            ->setDetailId($detailId);

        try {
            $this->productBindDetailAction->run($data);
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product binded with detail');
    }
}
