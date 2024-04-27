<?php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

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
        //return parent::toArray($request);
        if($this->status == 1){
            $status = 'ACTIVE';
        }else{
            $status = 'LOCKED';
        }
        //dd($this->image);
        //return ['aaaa'=>$this->location];
        $country = Country::where('id', $this->location->country_id)->first();
        $image = $this->image()->select('url')->first();
        return [
            'user' => [
                'id'=>$this->id,
                'name'=>$this->name,
                'surname'=>$this->surname,
                'nick_name'=>$this->nickname,
                'country' => $country->name,
                'email'=>$this->email,
                'email_verified_at'=> $this->email_verified_at,
                'profile_photo_path'=> $image->url,
                'profile' => $this->profile()->select('instagram','facebook', 'youtube')->first(),
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at,
                'user_status' => $status,
                
            ]
        ];
    }
}
