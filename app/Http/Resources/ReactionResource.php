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
        $name = User::where('id',$this->reactionmorphable_id)->first();


            return[
                "id" => $this->id,
                'mensaje' => $this->mensaje,
                // 'user_id' => "/api/user/".$this->user_id,
                "name" =>$name,
                // 'typereaction_id' => $this->typereaction_id,
                // //'typereaction' => TypeReaction::find($this->typereaction_id)->name,
                // "type" => $this->typereaction->name,
                'reacción creada '=> $time,
            ];


    }
}
