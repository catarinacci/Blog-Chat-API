<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
//use Illuminate\Database\Query\Builder;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification; 
//use Filament\Pages\Actions\Action;

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
            Tables\Columns\TextColumn::make('id')->color('primary')->sortable()->searchable(),
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
        // $resource = static::getResource();
        // //dd($resource);
        // return [ 
        //       Action::make('edit')
        //       ->action(fn (User $record) => redirect()->route('filament.resources.users.edit', ['record' => $record]))             
        // ];
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
    protected function getHeaderActions(): array
    {
        return [
            Action::make('Create')
     ];
    }
    // protected function getTableActions(): array
    // {
    //     return [
    //         Action::make('Back')->url(function(){
    //             return route('filament.resources.users.index', ['user'=> $this->getRedirectUrl()]);
    //         })
    //     ];
    // }
    // protected function getTableBulkActions(): array
    // {
    //     return [ 
    //         Tables\Actions\BulkAction::make('delete')
    //             ->label('Delete selected')
    //             ->color('danger')
    //             ->action(function (Collection $records): void {
    //                 $records->each->delete();
    //             })
    //             ->requiresConfirmation(),
    //     ]; 
    // }

    protected function getHeaderWidgets(): array
    
    {
        return [
          
            UserResource\Widgets\UsersOverview::class,
        ];
    }
}
