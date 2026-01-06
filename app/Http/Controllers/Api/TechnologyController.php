<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use OpenApi\Attributes as OA;

class TechnologyController extends Controller
{
    #[OA\Get(
        path: '/api/technologies',
        tags: ['Technologies'],
        summary: 'List technologies',
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Technology'))
            ),
        ],
    )]
    public function index()
    {
        return TechnologyResource::collection(Technology::all());
    }

    #[OA\Get(
        path: '/api/technologies/{technology}',
        tags: ['Technologies'],
        summary: 'Get technology by id',
        parameters: [
            new OA\Parameter(name: 'technology', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/Technology')
            ),
            new OA\Response(response: 404, description: 'Not found'),
        ],
    )]
    public function show(Technology $technology)
    {
        return new TechnologyResource($technology);
    }

}
