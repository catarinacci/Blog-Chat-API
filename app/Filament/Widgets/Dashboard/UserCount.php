<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Comment;
use App\Models\Note;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;

class UserCount extends BaseWidget
{

    

    protected function getCards(): array
    {
        $users = User::count();
        $posts = Note::count();
        $comments = Comment::count();

        return [
            Card::make(label: 'Users', value:$users)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
            
            Card::make(label: 'Posts', value:$posts)
            ->icon(icon: 'heroicon-o-newspaper')
            ->description(description: 'Total de posts en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),

            Card::make(label: 'Comments', value:$comments)
            ->icon(icon: 'heroicon-o-chat')
            ->description(description: 'Total de comentarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),

            Card::make(label: 'Reactions', value:$comments)
            ->icon(icon: 'heroicon-o-chat')
            ->description(description: 'Total de reacciones en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
        ];
    }
}
