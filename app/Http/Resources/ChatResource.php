<?php

namespace App\Http\Resources;

use App\Models\Chat;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $user = Auth::user();
        $chat = Chat::where('id', $this->id)->first();
        // $members = $chat->users->contains($user->id);
        $members = $chat->users;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'created_by' => $user,
            'members' => $members
        ];
    }
}
