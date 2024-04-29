<?php

namespace App\Http\Resources;

use App\Http\Resources\Child\ChildResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'children_count' => $this->whenCounted('children'),
            'children' => $this->whenLoaded('children', function () {
                return $this->children->sortByDesc('date_of_birth')->map(function ($child) {
                    return ChildResource::make($child);
                });
            }),
            'email_verified_at' => $this->email_verified_at,
        ];
    }
}
