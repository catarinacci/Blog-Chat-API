<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\PostComments;
use App\Forms\Components\UserComment;
use App\Models\Comment;
use App\Models\Note;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;

class ShowComment extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-comment';

    public Note $note;

    public $record;
    public $comments;
    public $reactionms;

    public function mount(): void
    {
        // $note = Note::where('id', $this->record)->first();
        // //$comments
        // $this->recordOld = $note->user_id;
        //dd($this->record);
    }

    protected function getFormSchema(): array
    {
        // $note = Comment::where('id', $this->record)->first();
        
        $this->comments = Comment::where('id', $this->record)->first();
        //$this->reactionms = Reactionm::where('reactionmable_id', $this->comments->id)->get();
        //dd($this->comments);

        return [


            // 
            Card::make()
                ->schema([
                    //PostCard::make()->items(['post' => $note], [$this->comments]),
                    UserComment::make()->items($this->comments)
                    //->itemsl($this->reactiomns)

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.comments-user', ['record' => $this->comments->user_id]))
                //->color('success')
                ->button()
        ];
    }
}
