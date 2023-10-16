<?php

namespace App\Filament\Pages\User;

use Filament\Pages\Page;

class ListUser extends Page 
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.user.list-user';
   
    public static function getWidgets(): array
    {
        return [
            UserResource\Widgets\UsersOverview::class,
        ];
    }
}
