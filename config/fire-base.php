<?php

return [
    'key' => env('JWT_AUTH_KEY', ''),
    'jwt_ttl' => env('JWT_TOKEN_TTL', 60 * 10),
];
