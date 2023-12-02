<?php

namespace App\ShopApi\Security\Permission\Exception;

use App\ShopApi\Exception\RuntimeException;
use Throwable;

class AccessDenied extends RuntimeException
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Access Denied', $code, $previous);
    }
}
