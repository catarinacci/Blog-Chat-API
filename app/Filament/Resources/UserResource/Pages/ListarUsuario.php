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
//use Illuminate\Database\Query\Builder;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Support\Facades\DB;

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
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
            Tables\Columns\ImageColumn::make('profile_photo_path')->disk('s3')->circular(),
            Tables\Columns\TextColumn::make('updated_at')->sortable(),
            Tables\Columns\TextColumn::make('email_verified_at'),
            Tables\Columns\TextColumn::make('status')
        ]; 
    }


    // protected function getTableActions(): array
    // {   
    //     // $resource = static::getResource();
    //     // //dd($resource);
    //     // return [ 
    //     //       Action::make('edit')
    //     //       ->action(fn (User $record) => redirect()->route('filament.resources.users.edit', ['record' => $record]))             
    //     // ]; 
    // }
    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (User $record): string => route('filament.resources.users.edit', ['record' => $record]);
    }

    protected function getTableBulkActions(): array
    {
        return [ 
            Tables\Actions\BulkAction::make('delete')
                ->label('Delete selected')
                ->color('danger')
                ->action(function (Collection $records): void {
                    $records->each->delete();
                })
                ->requiresConfirmation(),
        ]; 
    }

    protected function getHeaderWidgets(): array
    
    {
        return [
            UserResource\Widgets\UsersOverview::class,
        ];
    }
}
