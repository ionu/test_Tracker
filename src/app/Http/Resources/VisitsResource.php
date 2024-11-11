<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        JsonResource::wrap('visits');
        return [
            'unique_visits' => $this->total_unique_visits,
            'url' => $this->url,
        ];
    }
}
