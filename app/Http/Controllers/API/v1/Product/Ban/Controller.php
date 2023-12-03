<?php

namespace App\Http\Controllers\API\v1\Product\Ban;

use App\Http\Controllers\API\v1\Product\Publish\ValueObject\ProductIdentificationData;
use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Action\ProductBanAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductBanAction    $productBanAction,
        private readonly JsonResponseFactory $jsonResponseFactory
    ) {}

    public function run(string $alias): JsonResponse
    {
        try {
            $this->productBanAction->run(new ProductIdentificationData($alias));
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product banned');
    }
}
