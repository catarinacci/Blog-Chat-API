<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use App\Forms\Components\ImageNote;
use App\Forms\Components\TagEdit;
use App\Models\Image;
use App\Models\Note;
use App\Models\Tag;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;


class EditarNote extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.editar-note';

    protected static ?string $title = 'Edit Posts';

    public $note;
    public $tags;
    public $record;
    public array $data = [];
    public $path_image = '';
    public $array = [];


    public function mount($record): void
    {
        //dd($this->note);
        $this->note = Note::where('id', $this->record)->first();
        $this->tags = $this->tags = DB::table('note_tag')->where('note_id', $this->note->id)->get();
        $data = $this->tags->toArray();

        foreach ($data as $key) {
            $name = DB::table('tags')->where('id', $key->tag_id)->value('name');
            array_push($this->array, $name);
        }

        //dd($note);
        $this->form->fill([
            'titulo' => $this->note->title,
            'content' => $this->note->content,
            'image_note_path' => $this->note->image_note_path,

        ]);
    }

    protected function getFormSchema(): array
    {

        $tags = Tag::all();
        $tags_array = [];

        foreach ($tags as $key) {

            array_push($tags_array, $key->name);
        }

        return [

            Card::make()
                ->schema([
                    TextInput::make('titulo')->required()->maxValue(30),
                    TextInput::make('content')->required()->maxValue(100),
                ]),
            Card::make()
                ->schema([


                    Select::make('delete_tag')->label('Delete Tag')
                        ->multiple()
                        ->options($this->array),

                    Select::make('add_tag')->label('Add Tag')
                        ->multiple()
                        ->options($tags_array)
                ]),
            Card::make()
                ->schema([
                    ImageNote::make('image_note_path')->items([
                        'path' => $this->note->image_note_path
                    ])->reactive(),

                    FileUpload::make('image_note_path')->disk('s3')
                        ->image()->enableOpen()->imageResizeMode('cover'),
                ]),
        ];
    }


    protected function getActions(): array
    {

        return [

            Action::make('Back')
                ->url(route('filament.resources.notes.show-post', ['record' => $this->record]))
                //->color('secondary')
                ->button()
        ];
    }

    protected function getFormActions(): array
    {

        return [

            Action::make('Save Change')
                ->submit('save')
        ];
    }

    public function save(): array
    {
        $note = Note::where('id', $this->record)->first();

        $data = $this->form->getState();

        $path_image = $data['image_note_path'];

        //dd($data);

        if ($note->status == 1) {

            if ($path_image) {

                $image_object =  Image::where('imageable_id', $note->id)
                    ->where('imageable_type', 'App\Models\User')->first();

                $paths3 = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/' . $path_image;

                // $image_object->update([
                //     'url' => $paths3
                // ]);

                $tags_add = $data['add_tag'];

                if ($tags_add) {

                    foreach ($tags_add as $key) {
                        $i = $key + 1;
                        $tag_exist = DB::table('note_tag')->where('tag_id', $i)->where('note_id', $note->id)->first();
                        if (!$tag_exist) {
                            DB::table('note_tag')->insert([
                                'note_id' => $note->id,
                                'tag_id' => $key + 1,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                        }
                    }
                }

                $tags_delete = $data['delete_tag'];
                
                if($tags_delete){

                    foreach ($tags_delete as $key ) {
                     
                        $tag_id = Tag::where('name', $this->array[$key])->value('id');
                        DB::table('note_tag')->where('tag_id', $tag_id)->where('note_id', $note->id)->delete();
                    }
                }

                $note->update([
                    'title' => $data['titulo'],
                    'content' => $data['content'],
                    'image_note_path' => $paths3
                ]);

                Notification::make()
                    ->title('Udated successfully')
                    ->success()
                    ->send();

                return [Redirect()->route('filament.resources.notes.show-post', ['record' => $this->record])];
            } else {
                $tags_add = $data['add_tag'];

                if ($tags_add) {

                    foreach ($tags_add as $key) {
                        $i = $key + 1;
                        $tag_exist = DB::table('note_tag')->where('tag_id', $i)->where('note_id', $note->id)->first();
                        if (!$tag_exist) {
                            DB::table('note_tag')->insert([
                                'note_id' => $note->id,
                                'tag_id' => $key + 1,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                        }
                    }
                }

                $tags_delete = $data['delete_tag'];

                if($tags_delete){

                    foreach ($tags_delete as $key ) {
                     
                        $tag_id = Tag::where('name', $this->array[$key])->value('id');
                        DB::table('note_tag')->where('tag_id', $tag_id)->where('note_id', $note->id)->delete();
                    }
                }

                $note->update([
                    'title' => $data['titulo'],
                    'content' => $data['content'],
                ]);

                Notification::make()
                    ->title('Udated successfully')
                    ->success()
                    ->send();

                return [Redirect()->route('filament.resources.notes.show-post', ['record' => $this->record])];
            }
        } else {
            Notification::make()
                ->title('Post LOKED')
                ->danger()
                ->body('Data cannot be updated')
                ->send();
            return [];
        }
        return [];
    }
}
