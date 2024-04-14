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
use Illuminate\Support\Facades\DB;

class ShowPost extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.show-post';

    public Note $note;

    public $record;

    public $recordOld;

    public $comments;

    public $reactionms;

    public $tags;

    public $array = [];

    public function mount(): void
    {
        $note = Note::where('id', $this->record)->first();
        //$comments
        $this->recordOld = $note->user_id;
        //dd($note);
    }

    protected function getFormSchema(): array
    {
        $note = Note::where('id', $this->record)->first();
        //dd($note);
        $this->comments = Comment::where('note_id', $note->id)->get();
        $this->reactionms = Reactionm::where('reactionmable_id', $note->id)->get();
        $this->tags = DB::table('note_tag')->where('note_id',$note->id)->get();
        $data = $this->tags->toArray();
        
        foreach ($data as $key ) {
            $name = DB::table('tags')->where('id', $key->tag_id)->value('name');
            array_push($this->array, $name);
        }
        //dd($this->array);


        return [


            // 
            Card::make()
                ->schema([
                    //PostCard::make()->items(['post' => $note], [$this->comments]),
                    PostCard::make()->itemsc($this->comments)
                        ->itemsl($this->reactionms)
                        ->items(['id'=>$note->id,'content' => $note->content, 'title' => $note->title, 'image_note_path' => $note->image_note_path])
                        ->itemst($this->array)

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
