<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Contracts\HasTable;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Closure;
use Filament\Pages\Actions\Action;

class ListComment extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.list-comment';
    public $record;

    public function mount(): void
    {
            ($this->record);
      
    }

    protected function getTableQuery(): Builder 
    {
        
        return Comment::query()->where('user_id', $this->record)->orderBy('updated_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {  
        return [            
        Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('content')->limit(20)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('note_id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('note_title')->limit(20)->sortable()->searchable()->html()->getStateUsing( function (Comment $record){
            $note_title = Note::where('id',$record->note_id)->select('notes.title')->first();
            return $note_title->title;
         }),
         Tables\Columns\TextColumn::make('Reactionms')->getStateUsing( function (Comment $record){
            return Reactionm::where('reactionmable_id',$record->id)->count();
         }),
        Tables\Columns\TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Comment $record): string => route('filament.resources.users.show-comment-user', ['record' => $record]);
        
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
