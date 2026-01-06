<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Technology',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', description: 'Identifier', example: 1),
        new OA\Property(property: 'title', type: 'string', description: 'Technology name', example: 'Laravel'),
        new OA\Property(property: 'icon', type: 'string', format: 'uri', nullable: true, description: 'Icon URL', example: 'https://example.com/storage/icons/laravel.svg'),
    ],
)]
class TechnologyResource extends JsonResource
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
            'icon' => $this->icon ? Storage::disk('public')->url($this->icon) : null,
        ];
    }
}
