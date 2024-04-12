<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\UserCommentLike;
use App\Models\Comment;
use App\Models\Reactionm;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;

class ShowCommentLike extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-comment-like';


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
                    UserCommentLike::make()->items($this->reactionmObject)

                ]),

        ];
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.show-comment-user', ['record' => $this->comment->id]))
                ->button()
        ];
    }
}
