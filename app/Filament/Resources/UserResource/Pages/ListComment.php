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
use App\Models\User;
use Filament\Pages\Actions\Action as Actionn;

class ListComment extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.list-comment';
    public $record;

    public function mount(): void
    {
            //dd($this->record);
        //     $a =Comment::query()->where('user_id', $this->record)->orderBy('updated_at', 'desc');
        // dd($a->user());
    }

    protected function getTableQuery(): Builder 
    {
        
        // $a =Comment::query()->where('user_id', 1)->orderBy('updated_at', 'desc');
        // dd($a);
        return Comment::query()->where('user_id', $this->record)->orderBy('updated_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {  
        return [            
        Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->sortable()->searchable(),
        // Tables\Columns\TextColumn::make('title')->limit(10)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('content')->limit(20)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('note_id')->color('primary')->words(1)->sortable()->searchable(),
        Tables\Columns\TextColumn::make('note_title')->limit(20)->sortable()->searchable()->html()->getStateUsing( function (Comment $record){
            $note_title = Note::where('id',$record->note_id)->select('notes.title')->first();
            return $note_title->title;
         }),
         Tables\Columns\TextColumn::make('Reactionms')->getStateUsing( function (Comment $record){
            return Reactionm::where('reactionmable_id',$record->id)->count();
         }),
        // Tables\Columns\TextColumn::make('title post')->label('title post')->limit(10)->sortable()->searchable(),
        //Tables\Columns\TextColumn::make('user_id')->color('primary')->words(1)->sortable()->searchable(), 
        // Tables\Columns\TextColumn::make('post creator name')->label('post creator name')->limit(10)->sortable()->searchable(),
        // Tables\Columns\ImageColumn::make('image_note_path')->label('Image Post')->disk('s3')->circular(),
        //Tables\Columns\TextColumn::make('status'),
        Tables\Columns\TextColumn::make('updated_at')->date(),
        ];
    }

}
