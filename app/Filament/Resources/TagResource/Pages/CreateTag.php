<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Models\Tag;
use Filament\Resources\Pages\Page;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class CreateTag extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = TagResource::class;

    protected static string $view = 'filament.resources.tag-resource.pages.create-tag';

    public Tag $note;
    public $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        $tags = Tag::where('status',1)->get();

        //dd($tags_array);


        return [

            Card::make()
                ->schema([
                    TextInput::make('name')->maxLength(20)->required(),
                ]),
        ];
    }

    protected function getActions(): array
    {
        return [
            Action::make('Back')->url(function () {
                return route('filament.resources.tags.index');
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

        //dd($data['name']);

        $tag_exist = Tag::where('name','iLike',$data['name'])->first();

        if(!$tag_exist){
            
            $newtag = new Tag;
            $newtag->name = $data['name'];
            $newtag->status = "1";
            $newtag->save();

            Notification::make() 
                ->title('Created successfully')
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
