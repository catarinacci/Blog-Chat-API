<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use App\Forms\Components\PostComments;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;

class ShowComment extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.show-comment';

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
        
        $this->comments = Comment::where('note_id', $this->record)->get();
        //$this->reactionms = Reactionm::where('reactionmable_id', $this->comments->id)->get();
        //dd($this->comments);

        return [


            // 
            Card::make()
                ->schema([
                    //PostCard::make()->items(['post' => $note], [$this->comments]),
                    PostComments::make()->itemsc($this->comments)
                    //->itemsl($this->reactiomns)

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.show-post-user', ['record' => $this->record]))
                //->color('success')
                ->button()
        ];
    }
}
