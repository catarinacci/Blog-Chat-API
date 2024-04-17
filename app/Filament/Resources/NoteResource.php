<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoteResource\Pages;
use App\Filament\Resources\NoteResource\RelationManagers;
use App\Models\Note;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;

class NoteResource extends Resource
{
    protected static ?string $model = Note::class;
    
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Posts';
   
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListaNote::route('/'),
            'create' => Pages\CreateNote::route('/create'),
            'edit' => Pages\EditarNote::route('/{record}/edit'),
            'locked' => Pages\Loked::route('/locked'),
            'show-post' => Pages\ShowNote::route('/{record}/show-post'),
            'show-comment' => Pages\ShowComment::route('/{record}/show-comment'),
            'show-likes' => Pages\ShowLikes::route('/{record}/show-likes'),
            'show-comment-likes' => Pages\ShowCommentLikes::route('/{record}/show-comment-likes'),
            'show-note-comment' => Pages\ShowNoteComment::route('/{record}/show-note-comment'),
            
        ];
    }    
}
