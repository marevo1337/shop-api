<?php

namespace App\Http\Middleware;

use App\ShopApi\Security\Auth\Exception\AuthError;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;
use App\UI\Response\JsonResponseFactory;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;;

class Authenticate
{
    public function __construct(
        private readonly AuthServiceInterface $authService,
        private readonly JsonResponseFactory  $jsonResponseFactory
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $this->authService->getUser();
        } catch (AuthError $e) {
            return $this->jsonResponseFactory->error($e->getMessage());
        }

        return $next($request);
    }
}
