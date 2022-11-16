<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;

use App\Models\Reactionm;
use App\Models\User;
use Illuminate\Http\Request;

class ReactionmController extends Controller
{
    public function reactionNote(){

        $note = Note::find(1);
        $a = $note->reactionms;
        return $a;
    }

    public function index(){
        //$reaction = Reactionm::find(1);
        // return $reactions;
        $note = Note::find(1);
        $user = User::find(1);
        // $a = $note->reactionms;
        // $a = $user->reactionms;
        // return $a;
        $comment = Comment::find(13);
        $a = $comment->reactionms;
        return $a;
        $reactions = Reactionm::where('reactionmable_id',$comment->id)
                                ->where('reactionmable_type', 'App\Model\Comment')
                                ->get();
       // $reactions = Reactionm::all();
        return $reactions;
    }
}
