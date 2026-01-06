<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'Portfolio API',
    version: '1.0.0',
    description: 'API documentation for the portfolio project',
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Local development server',
)]
class OpenApi
{
}
