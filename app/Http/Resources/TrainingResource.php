<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Training',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', description: 'Identifier', example: 1),
        new OA\Property(property: 'title', type: 'string', description: 'Title', example: 'AWS Certified Developer'),
        new OA\Property(property: 'qualification', type: 'string', nullable: true, description: 'Qualification/degree', example: 'Associate'),
        new OA\Property(property: 'program_name', type: 'string', nullable: true, description: 'Program name', example: 'Cloud Practitioner'),
        new OA\Property(property: 'date_from', type: 'string', format: 'date', nullable: true, description: 'Start date', example: '2024-01-01'),
        new OA\Property(property: 'date_to', type: 'string', format: 'date', nullable: true, description: 'End date', example: '2024-03-31'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', description: 'Created at', example: '2025-01-05T12:34:56Z'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', description: 'Updated at', example: '2025-01-06T08:00:00Z'),
    ],
)]
class TrainingResource extends JsonResource
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
            'title' => $this->title,
            'qualification' => $this->qualification,
            'program_name' => $this->program_name,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
