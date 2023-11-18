<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\Action;
use App\Models\User;
use App\Models\Note;
use Filament\Pages\Actions\Action as Actionn;

class ListPosts extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.list-posts';

    public $record;

    public function mount(): void
    {
  
    }
 

    protected function getTableQuery(): Builder 
    {
        return Note::query()->where('user_id', $this->record)->orderBy('updated_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {  
        return [            
        Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('title')->limit(10)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('content')->limit(20)->sortable()->searchable(),
        Tables\Columns\ImageColumn::make('image_note_path')->label('Image Post')->disk('s3')->circular(),
        Tables\Columns\TextColumn::make('status'),
        Tables\Columns\TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getActions(): array
    {
        return [
           Actionn::make('Back')
           ->url(route('filament.resources.users.edit',['record' => $this->record]))
           ->color('secondary')
           ->button(),
        ];
    }
}
