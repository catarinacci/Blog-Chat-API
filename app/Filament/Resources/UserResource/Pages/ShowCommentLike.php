<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\UserCommentLike;
use App\Models\Comment;
use App\Models\Reactionm;
use App\Models\User;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;

class ShowCommentLike extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-comment-like';

    //public Comment $comment;

    public $record;
    public $comment;
    public $reactionm;
    public $reactionmObject;

    public function mount(): void
    {
         $reactionm = Reactionm::where('id', $this->record)->first();
         $this->comment = Comment::where('id', $reactionm->reactionmable_id )->first();
        // //$comments
        // $this->recordOld = $note->user_id;
        //dd($this->comment);
    }

    protected function getFormSchema(): array
    {
        // $note = Comment::where('id', $this->record)->first();

       // $this->comments = Comment::where('note_id', $this->record)->get();
        $this->reactionmObject = Reactionm::where('id', $this->record)->first();
        //dd($this->reactionmObject);

        return [


            // 
            Card::make()
                ->schema([
                    //PostCard::make()->items(['post' => $note], [$this->comments]),
                    //PostComments::make()->itemsc($this->comments)
                    //->itemsl($this->reactiomns)
                    UserCommentLike::make()->items($this->reactionmObject)

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.show-comment-user', ['record' => $this->comment->id]))
                //->color('success')
                ->button()
        ];
    }
}
