<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\PostCard;
use App\Forms\Components\ProfileCard;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Forms\Components\Card;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;

class ShowPost extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-post';

    public Note $note;

    public $record;

    public $recordOld;

    public $comments;

    public $reactionms;

    public function mount(): void
    {
        $note = Note::where('id', $this->record)->first();
        //$comments
        $this->recordOld = $note->user_id;
    }

    protected function getFormSchema(): array
    {
        $note = Note::where('id', $this->record)->first();
        //dd($note);
        $this->comments = Comment::where('note_id', $note->id)->get();
        $this->reactionms = Reactionm::where('reactionmable_id', $note->id)->get();
        //dd($this->comments[0]->id);

        return [


            // 
            Card::make()
                ->schema([
                    //PostCard::make()->items(['post' => $note], [$this->comments]),
                    PostCard::make()->itemsc($this->comments)
                        ->itemsl($this->reactionms)
                        ->items(['id'=>$note->id,'content' => $note->content, 'title' => $note->title, 'image_note_path' => $note->image_note_path])

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.posts-user', ['record' => $this->recordOld]))
                //->color('success')
                ->button()
        ];
    }
}
