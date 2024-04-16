<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use App\Forms\Components\PostCommentLikes;
use Filament\Resources\Pages\Page;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Forms\Components\Card;
use Filament\Pages\Actions\Action;

class ShowCommentLikes extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.show-comment-likes';

    public Comment $note;

    public $record;
    public $comment;
    public $reactionm;
    public $reactionmObject;

    public function mount(): void
    {
         $reactionm = Reactionm::where('id', $this->record)->first();
         $this->comment = Comment::where('id', $reactionm->reactionmable_id )->first();

    }

    protected function getFormSchema(): array

    {
        $this->reactionmObject = Reactionm::where('id', $this->record)->first();
        return [           
            Card::make()
                ->schema([
                    PostCommentLikes::make()->items($this->reactionmObject)

                ]),
        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.notes.show-note-comment', ['record' => $this->comment->note_id]))
                //->color('success')
                ->button()
        ];
    }
}
