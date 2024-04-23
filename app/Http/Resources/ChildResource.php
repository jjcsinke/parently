<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChildResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'age' => now()->diff($this->date_of_birth)->y,
            'date_of_birth' => $this->date_of_birth,
            'school' => $this->whenLoaded('school', fn () => SchoolResource::make($this->school)),
        ];
    }
}
