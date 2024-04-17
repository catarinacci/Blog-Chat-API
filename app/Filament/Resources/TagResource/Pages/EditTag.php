<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
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

class EditTag extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = TagResource::class;

    protected static string $view = 'filament.resources.tag-resource.pages.edit-tag';

    public $tag;
    public $record;

    public function mount($record): void
    {
        //dd($this->note);
        $this->tag = Tag::where('id', $this->record)->first();
      

        //dd($note);
        $this->form->fill([
            'name' => $this->tag->name,

        ]);
    }

    protected function getFormSchema(): array
    {

        return [
            
            Card::make()
                ->schema([
                    TextInput::make('name')->required()->maxValue(30),
                ]),
        ];
    }


    protected function getActions(): array
    {

        return [

            Action::make('Back')
                ->url(route('filament.resources.tags.index'))
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
        //$note = Note::where('id', $this->record)->first();

        $data = $this->form->getState();

        $tag_exist = Tag::where('name','iLike',$data['name'])->first();


        if(!$tag_exist){
            
            $this->tag->update([
                'name' => $data['name']
            ]);


            Notification::make() 
                ->title('Updated successfully')
                ->success()
                ->send();
                                
                return [Redirect()->route('filament.resources.tags.index')];

        }else{
            Notification::make() 
                ->title('The tag already exists')
                ->danger()
                ->send();
                                
                return [];
        }

        return[];
    }


}
