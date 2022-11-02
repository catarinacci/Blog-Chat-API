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
        return [
            'user' => [
                'id'=>$this->id,
                'name'=>Str::upper($this->name),
                'surname'=>Str::upper($this->surname),
                'nick_name'=>Str::ucfirst($this->nickname),
                'email'=>$this->email,
                'email_verified_at'=> $this->email_verified_at,
                'image_profile_path'=> $this->image_profile_path,
                'created_at'=> $this->created_at->format('Y-m-d'),
                'updated_at'=> $this->updated_at->format('Y-m-d'),
            ]
        ];
    }
}
