<?php

namespace App\Http\Controllers\API\v1\Detail\Create;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\v1\Detail\Create\Request;
use App\ShopApi\Detail\Action\DetailCreateAction;
use App\ShopApi\Exception\RuntimeException;
use App\UI\Response\JsonResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller extends BaseController
{
    public function __construct(
        private readonly DetailCreateAction  $detailCreateAction,
        private readonly JsonResponseFactory $jsonResponseFactory
    ) {}

    public function run(Request $request): JsonResponse
    {
        try {
            $this->detailCreateAction->run($request->getData());
        } catch (RuntimeException $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $this->jsonResponseFactory->success('Detail created');
    }
}
