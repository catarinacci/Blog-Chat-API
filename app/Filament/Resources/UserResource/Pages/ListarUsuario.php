<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use App\Models\User;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\Action;
use Closure;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action as Actionn;

class ListarUsuario extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;
    

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.listar-usuario';


    protected function getTableQuery(): Builder 
    {

        return User::query()->orderBy('updated_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {  
        
        return [ 
            Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->sortable()->searchable(),
            Tables\Columns\TextColumn::make('name')->sortable()->searchable()->wrap(),
            Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
            Tables\Columns\ImageColumn::make('profile_photo_path')->label('Profile photo')->disk('s3')->circular(),
            Tables\Columns\TextColumn::make('updated_at')->sortable()->date(),
            Tables\Columns\TextColumn::make('email_verified_at')->date(),
            Tables\Columns\TextColumn::make('status')->sortable()->searchable()
        ]; 
    }


    protected function getTableActions(): array
    {   
    return [ 
        
        Action::make('Block')
            ->label('Block')
            ->color('danger')
            ->action(function (User $record): void {
                //dd($record);
                $record->update([
                    "status" => '2',
                ]);
                Notification::make() 
                ->title('Block successfully')
                ->success()
                ->send();
                //$record->each->delete();
            })
            ->requiresConfirmation(),
            Action::make('Unlock')
            ->label('Unlok')
            ->color('success')
            ->action(function (User $record): void {
                //dd($record);
                $record->update([
                    "status" => '1',
                ]);
                Notification::make() 
                ->title('Unlock successfully')
                ->success()
                ->send();
                //$record->each->delete();
            })
            ->requiresConfirmation(),
    ];  
     }
    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (User $record): string => route('filament.resources.users.edit', ['record' => $record]);
    }

    protected function getActions(): array
     {
         return [
            Actionn::make('Create User')
            ->url(route('filament.resources.users.create')),
         ];
     }

    protected function getHeaderWidgets(): array
    
    {
        return [
          
            UserResource\Widgets\UsersOverview::class,
        ];
    }
}
