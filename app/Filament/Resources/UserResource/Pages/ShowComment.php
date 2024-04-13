<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
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
        //dd($this->record);
    }

    protected function getFormSchema(): array
    {
        
        $this->comments = Comment::where('id', $this->record)->first();
    
        return [

            Card::make()
                ->schema([
                    UserComment::make()->items($this->comments)
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
