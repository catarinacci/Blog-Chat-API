<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Model;


class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label(__('filament::resources/pages/create-record.form.actions.create.label'))
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function getActions(): array
    {
        return [
            Action::make('settings')
                ->label('Settings')
                ->action('save')
                ->requiresConfirmation(),

                // Action::make('save')
                // ->label(__('rear'))
                // ->submit('save'),
        ];
    }
    public function save(): array
    {
        $data = $this->form->getState();
        //echo('a');
        //$data = $this->mutateFormDataBeforeCreate($data);
        return [$data];
        //echo($data);
        //var_dump($data);
        // try {
        //     $data = $this->form->getState();
 
        //     auth()->user()->company->update($data);
        // } catch ($exception) {
        //     return;
        // }
    }

 }
