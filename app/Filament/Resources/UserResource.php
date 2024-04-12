<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\Unverifyed;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    //     public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
    //             Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
    //             Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
    //             Tables\Columns\ImageColumn::make('profile_photo_path')->disk('s3')->circular(),
    //             Tables\Columns\TextColumn::make('email_verified_at'),
    //             Tables\Columns\TextColumn::make('status')
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

    // protected function getRedirectUrl(): ?string
    // {
    //     return static::getResource()::getUrl('index');
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListarUsuario::route('/'),
            'create' => Pages\CrearUsuario::route('/create'),
            'edit' => Pages\EditarUsuario::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view'),
            'unverifyed' => Pages\Unverifyed::route('/unverifyed'),
            'loked' => Pages\Locked::route('loked'),
            'posts-user' => Pages\ListPosts::route('/{record}/posts-user'),
            'comments-user' => Pages\ListComment::route('/{record}/comments-user'),
            'likes-user' => Pages\ListPosts::route('/{record}/likes-user'),
            'show-post-user' =>  Pages\ShowPost::route('/{record}/show-post-user'), 
            'show-comment-user' =>  Pages\ShowComment::route('/{record}/show-comment-user'), 
            'show-comment-like-user' =>  Pages\ShowCommentLike::route('/{record}/show-comment-like-user'),               
        ];
    }
}
