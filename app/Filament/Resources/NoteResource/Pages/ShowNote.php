<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use App\Forms\Components\NoteCard;
use App\Forms\Components\PostCard;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\DB;

class ShowNote extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.show-note';

    protected static ?string $title = 'Show Posts';

    public Note $note;

    public $record;

    public $recordOld;

    public $comments;

    public $reactionms;

    public $tags;

    public $array = [];

    public $noteObject;


    public function mount(): void
    {
        $this->noteObject = Note::where('id', $this->record)->first();
        //$comments
        //$this->recordOld = $note->user_id;
        //dd($this->noteObject->id);
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
                    NoteCard::make()->itemsc($this->comments)
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
                ->url(route('filament.resources.notes.index'))
                //->color('success')
                ->button(),

                Action::make('edit')
                ->url(route('filament.resources.notes.edit', ['record' => $this->noteObject->id]))
                ->color('success')
                ->button()
        ];
    }


    // protected function getFormActions(): array
    // {

    //     return [

    //         Action::make('edit')
    //             ->url(route('filament.resources.users.edit', ['record' => $this->record]))
    //             ->color('success')
    //             ->button()
    //     ];
    // }
}
