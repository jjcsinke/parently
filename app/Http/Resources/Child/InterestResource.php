<?php

namespace App\Http\Resources\Child;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterestResource extends JsonResource
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
            'name' => __('interests.'.$this->slug),
            'icon' => '/images/interests/default.svg'
        ];
    }
}
