<?php

namespace App\Http\Resources;

use App\Models\Kangaroo;
use Illuminate\Http\Resources\Json\JsonResource;

class KangarooResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'nickname'     => $this->nickname,
            'gender'       => $this->gender,
            'birthday'     => $this->birthday,
            'weight'       => $this->weight,
            'height'       => $this->height,
            'color'        => $this->color,
            'friendliness' => $this->friendliness,
        ];
    }
}
