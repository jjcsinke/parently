<?php

namespace App\Http\Resources\Child;

use App\Http\Resources\SchoolResource;
use App\Http\Resources\UserCollection;
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
            'parents' => $this->whenLoaded('parents', fn () => UserCollection::make($this->parents)),
            'interests' => $this->whenLoaded('interests', fn () => InterestCollection::make($this->interests)),
        ];
    }
}
