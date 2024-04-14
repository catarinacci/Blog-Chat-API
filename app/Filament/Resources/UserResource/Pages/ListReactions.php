<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Reactionm;
use Closure;
use Filament\Tables;
use Filament\Resources\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Builder;

class ListReactions extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.list-reactions';

    protected static ?string $title = 'List Likes';

    public $record;

    public function mount(): void
    {
            //dd($this->record);
      
    }

    protected function getTableQuery(): Builder 
    {
        
        return Reactionm::query()->where('user_id', $this->record)->orderBy('updated_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {  
         return 
         [            
        Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('mensaje')->limit(20)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('reactionmable_id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('reactionmable_type')->limit(20)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Reactionm $record): string => route('filament.resources.users.show-reaction-user', ['record' => $record->id]);
        
    }

    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->url(route('filament.resources.users.view', ['record' => $this->record]))
                ->button()
        ];
    }

}
