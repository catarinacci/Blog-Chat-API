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
    protected static ?string $navigationLabel = 'Post';
   
    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Select::make('category_id')
    //             ->relationship('category', 'name')
    //         ]);
    // }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             //
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\DeleteBulkAction::make(),
    //         ]);
    // }
    
    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListaNote::route('/'),
            'create' => Pages\CrearNote::route('/create'),
            'edit' => Pages\EditarNote::route('/{record}/edit'),
            'locked' => Pages\Loked::route('/locked'),
            'show-comment' => Pages\ShowComment::route('/{record}/show-comment'),
            'show-likes' => Pages\ShowLikes::route('/{record}/show-likes'),
        ];
    }    
}
