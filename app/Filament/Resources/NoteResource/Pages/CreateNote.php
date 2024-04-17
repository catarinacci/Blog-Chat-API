<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use Filament\Resources\Pages\Page;
use App\Models\Note;

use DateTime;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

use App\Models\Image;
use App\Models\Tag;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\DB;

class CreateNote extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.create-note';

    public Note $note;
    public Image $image;
    public $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        $tags = Tag::all();
        $tags_array = [];

        foreach ($tags as $key) {

            array_push($tags_array, $key->name);
        }
        //dd($tags_array);


        return [

            Card::make()
                ->schema([
                    TextInput::make('titulo')->maxLength(20)->required(),
                    TextInput::make('content')->maxLength(100)->required(),
                    FileUpload::make('image_path')->disk('s3')
                        ->image()->enableOpen()->imageResizeMode('cover'),
                    Select::make('tags')
                        ->multiple()
                        ->options($tags_array)

                ]),
        ];
    }

    protected function getActions(): array
    {
        return [
            Action::make('Back')->url(function () {
                return route('filament.resources.notes.index');
            })
        ];
    }

    protected function getFormActions(): array
    {
        return [

            Action::make('Save')
                ->submit('save')
            //->submit()
        ];
    }
    public function save(): array
    {
        $data = $this->form->getState();



        $paths3 = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/' . $data['image_path'];

        $newnote = new Note();

        $newnote->title = $data['titulo'];
        $newnote->content = $data['content'];
        $newnote->user_id = auth()->user()->id;
        $newnote->status = 1;

        $newnote->image_note_path = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/DwiqqtzUfbAZjxxIObaR2IcfG1Z9L8-metaTWFpbkFmdGVyLndlYnA%3D-.webp';
        if ($data['image_path']) {
            $newnote->image_note_path = $paths3;
        }
        $newnote->save();

        $tags = $data['tags'];

        foreach ($tags as $key) {
            //dd($key +1);
            DB::table('note_tag')->insert([
                'note_id' => $newnote->id,
                'tag_id' => $key + 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $newnote->image()->create(['url' => $paths3]);

        Notification::make()
            ->title('Created successfully')
            ->success()
            ->send();

        return [Redirect()->route('filament.resources.notes.show-post', ['record' => $newnote->id])];
    }
}
