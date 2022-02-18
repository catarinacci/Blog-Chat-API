<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'id' => $this->id,
            'name' => Str::of($this->name)->upper(),
            'email' => $this->email,
            'created_at' =>$this->created_at->format('d-m-Y'),
            'updated_at' =>$this->updated_at->format('d-m-Y')
        ];
    }
}
