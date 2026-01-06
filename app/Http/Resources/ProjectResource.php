<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Project',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', description: 'Identifier', example: 1),
        new OA\Property(property: 'title', type: 'string', description: 'Project title', example: 'Portfolio'),
        new OA\Property(property: 'description', type: 'string', nullable: true, description: 'Description', example: 'Business card site with admin panel'),
        new OA\Property(property: 'link', type: 'string', format: 'uri', nullable: true, description: 'Project link', example: 'https://example.com'),
        new OA\Property(property: 'image', type: 'string', format: 'uri', nullable: true, description: 'Image URL', example: 'https://example.com/storage/projects/1.png'),
    ],
)]
class ProjectResource extends JsonResource
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
            'description' => $this->description,
            'link' => $this->link,
            'image' => $this->image ? Storage::disk('public')->url($this->image) : null,
        ];
    }
}
