<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use OpenApi\Attributes as OA;

class TrainingController extends Controller
{
    #[OA\Get(
        path: '/api/trainings',
        tags: ['Trainings'],
        summary: 'List trainings',
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Training'))
            ),
        ],
    )]
    public function index()
    {
        return TrainingResource::collection(Training::all());
    }

    #[OA\Get(
        path: '/api/trainings/{training}',
        tags: ['Trainings'],
        summary: 'Get training by id',
        parameters: [
            new OA\Parameter(name: 'training', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/Training')
            ),
            new OA\Response(response: 404, description: 'Not found'),
        ],
    )]
    public function show(Training $training)
    {
        return new TrainingResource($training);
    }
}
