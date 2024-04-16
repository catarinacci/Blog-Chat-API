<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use App\Forms\Components\NoteComment;
use App\Models\Comment;
use App\Models\Note;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;

class ShowNoteComment extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.show-note-comment';

    protected static ?string $title = 'Show Post Comments';

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
        
        $this->comments = Comment::where('note_id', $this->record)->get();

        return [


            // 
            Card::make()
                ->schema([

                    NoteComment::make()->itemsc($this->comments)

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.notes.show-post', ['record' => $this->record]))
                //->color('success')
                ->button()
        ];
    }
}
