<?php

namespace App\Http\Controllers\API\v1\Product\Publish;

use App\Http\Controllers\API\v1\Product\Publish\ValueObject\ProductIdentificationData;
use App\Http\Controllers\BaseController;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Action\ProductPublishAction;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly ProductPublishAction $productPublishAction,
        private readonly JsonResponseFactory  $jsonResponseFactory
    ) {}

    public function run(string $alias): JsonResponse
    {
        try {
            $this->productPublishAction->run(new ProductIdentificationData($alias));
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Product published');
    }
}
