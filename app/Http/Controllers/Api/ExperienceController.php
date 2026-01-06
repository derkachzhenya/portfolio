<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use OpenApi\Attributes as OA;

class ExperienceController extends Controller
{
    #[OA\Get(
        path: '/api/experiences',
        tags: ['Experiences'],
        summary: 'List experiences',
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Experience'))
            ),
        ],
    )]
    public function index()
    {
        return ExperienceResource::collection(Experience::all());
    }

    #[OA\Get(
        path: '/api/experiences/{experience}',
        tags: ['Experiences'],
        summary: 'Get experience by id',
        parameters: [
            new OA\Parameter(name: 'experience', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/Experience')
            ),
            new OA\Response(response: 404, description: 'Not found'),
        ],
    )]
    public function show(Experience $experience)
    {
        return new ExperienceResource($experience);
    }
}
