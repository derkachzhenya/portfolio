<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Experience',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', description: 'Identifier', example: 1),
        new OA\Property(property: 'position', type: 'string', description: 'Position', example: 'Backend Developer'),
        new OA\Property(property: 'short_description', type: 'string', nullable: true, description: 'Short description', example: 'Working on APIs and integrations'),
        new OA\Property(property: 'date_from', type: 'string', format: 'date', description: 'Start date', example: '2023-01-01'),
        new OA\Property(property: 'date_to', type: 'string', format: 'date', description: 'End date', example: '2024-01-01'),
        new OA\Property(property: 'company_name', type: 'string', nullable: true, description: 'Company', example: 'Acme Inc'),
        new OA\Property(
            property: 'technologies',
            type: 'array',
            description: 'Technologies list',
            items: new OA\Items(ref: '#/components/schemas/Technology')
        ),
    ],
)]
class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'short_description' => $this->short_description,
            'date_from' => Carbon::parse($this->date_from)->translatedFormat('d.m.Y'),
            'date_to' => Carbon::parse($this->date_to)->translatedFormat('d.m.Y'),
            'company_name' => $this->company_name,
            'technologies' => TechnologyResource::collection($this->technologies),
        ];
    }
}
