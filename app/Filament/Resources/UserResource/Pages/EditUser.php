<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getFormSchema(): array 
    {
        //$user = User::where('id', $this->record)->first();
        
        return [      
                            
                            TextInput::make('name')->required()->maxValue(20),
                            TextInput::make('surname')->maxLength(20),
                            TextInput::make('nickname')->maxLength(20),
                            TextInput::make('email')->disabled(),
          
        ];
    }
    
    public function submit()
    {
        return dd('hola');

        // SAVE THE SETTINGS HERE
    }
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
