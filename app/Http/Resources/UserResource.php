<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'User',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', description: 'Identifier', example: 1),
        new OA\Property(property: 'name', type: 'string', description: 'First name', example: 'John'),
        new OA\Property(property: 'surname', type: 'string', description: 'Last name', example: 'Doe'),
        new OA\Property(property: 'position', type: 'string', nullable: true, description: 'Position', example: 'Backend Developer'),
        new OA\Property(property: 'description', type: 'string', nullable: true, description: 'About', example: 'Polyglot developer with 5+ years of experience'),
        new OA\Property(property: 'interests', type: 'string', nullable: true, description: 'Interests', example: 'Laravel, Docker, chess'),
        new OA\Property(property: 'image', type: 'string', format: 'uri', nullable: true, description: 'Image URL', example: 'https://example.com/storage/avatars/1.png'),
        new OA\Property(property: 'linkedin', type: 'string', nullable: true, description: 'LinkedIn URL', example: 'https://www.linkedin.com/in/john-doe'),
        new OA\Property(property: 'github', type: 'string', nullable: true, description: 'GitHub URL', example: 'https://github.com/johndoe'),
        new OA\Property(property: 'gitlab', type: 'string', nullable: true, description: 'GitLab URL', example: 'https://gitlab.com/johndoe'),
        new OA\Property(property: 'telegram', type: 'string', nullable: true, description: 'Telegram', example: '@johndoe'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', description: 'Created at', example: '2025-01-05T12:34:56Z'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', description: 'Updated at', example: '2025-01-06T08:00:00Z'),
    ],
)]
class UserResource extends JsonResource
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
            'name' => $this->name,
            'surname' => $this->surname,
            'position' => $this->position,
            'description' => $this->description,
            'interests' => $this->interests,
            'image' => $this->image ? Storage::disk('public')->url($this->image) : null,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'gitlab' => $this->gitlab,
            'telegram' => $this->telegram,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
