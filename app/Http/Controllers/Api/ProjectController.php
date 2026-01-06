<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use OpenApi\Attributes as OA;

class ProjectController extends Controller
{
    #[OA\Get(
        path: '/api/projects',
        tags: ['Projects'],
        summary: 'List projects',
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/Project'))
            ),
        ],
    )]
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    #[OA\Get(
        path: '/api/projects/{project}',
        tags: ['Projects'],
        summary: 'Get project by id',
        parameters: [
            new OA\Parameter(name: 'project', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/Project')
            ),
            new OA\Response(response: 404, description: 'Not found'),
        ],
    )]
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }
}
