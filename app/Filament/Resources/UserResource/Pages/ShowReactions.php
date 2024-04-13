<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\UserReactionComment;
use App\Forms\Components\UserReactionPost;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Filament\Pages\Actions\Action;

class ShowReactions extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-reactions';


    public $record;
    public $comment;
    public $note;
    public $reactionm;

    public function mount(): void
    {
        //dd($this->record);
        $this->reactionm = Reactionm::where('id', $this->record)->first();
        //dd($this->reactionm);
        if ($this->reactionm->reactionmable_type === "App\Model\Note") {

            $this->note = Note::where('id', $this->reactionm->reactionmable_id)->first();
        } else {
            $this->comment = Comment::where('id', $this->reactionm->reactionmable_id)->first();
        }
    }

    protected function getFormSchema(): array
    {

        //$this->comments = Comment::where('id', $this->record)->first();

        if ($this->reactionm->reactionmable_type === "App\Model\Note") {
            return [

                Card::make()
                    ->schema([

                        UserReactionPost::make()->items($this->note)
                    ]),

            ];
        } else {
            return [

                Card::make()
                    ->schema([

                        UserReactionComment::make()->items($this->comment)
                    ]),

            ];
        }
    }
    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.reactions-user', ['record' => $this->reactionm->user_id]))
                //->color('success')
                ->button()
        ];
    }
}
