<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\FormatTime;
use App\Models\User;

class ReactionResource extends JsonResource
{

    public function toArray($request)
    {

        $time = FormatTime::LongTimeFilter($this->created_at);


            return[
                "id" => $this->id,
                'note_id' =>"/api/note/". $this->note_id,
                'user_id' => "/api/user/".$this->user_id,
                "name" => User::find($this->user_id)->name,
                'typereaction_id' => $this->typereaction_id,
                //'typereaction' => TypeReaction::find($this->typereaction_id)->name,
                "type" => $this->typereaction->name,
                'reacción creada '=> $time,
            ];


    }
}
