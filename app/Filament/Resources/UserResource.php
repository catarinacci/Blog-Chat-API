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
            'unverifyed' => Pages\Unverifyed::route('/unverifyed'),
            'loked' => Pages\Locked::route('loked'),
            //'index' => Pages\ListUsers::route('/'),
            'index' => Pages\ListarUsuario::route('/'),
            //'create' => Pages\CreateUser::route('/create'),
            'create' => Pages\CrearUsuario::route('/create'),
            //'edit' => Pages\EditUser::route('/{record}/edit'),
            'edit' => Pages\EditarUsuario::route('/{record}/edit'),           
        ];
    }
}
