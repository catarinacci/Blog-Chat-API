<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserCount extends BaseWidget
{

    
    protected $listeners = [
        'redirectUser' => 'redirecU',
        'redirectNote' => 'redirecN',
        'redirectComment' => 'redirecC',
        'redirectReaction' => 'redirecR',
    ];
    

    public function redirecU(): array 
    { 
        return[Redirect()->route('filament.resources.users.index')];
    } 
    // public function redirecN(): array 
    // { 
    //     return[Redirect()->route('filament.resources.notes.index')];
    // }
    // public function redirecC(): array 
    // { 
    //     return[Redirect()->route('filament.resources.comments.index')];
    // }
    // public function redirecR(): array 
    // { 
    //     return[Redirect()->route('filament.resources.comments.index')];
    // }


    protected function getCards(): array
    {
        $users = User::count();
        $posts = Note::count();
        $comments = Comment::count();
        $reactions = Reactionm::count();

        return [
            Card::make(label: 'Users', value:$users)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => '$emitUp("redirectUser")',
            ]),
            
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

            Card::make(label: 'Reactions', value:$reactions)
            ->icon(icon: 'heroicon-o-chat')
            ->description(description: 'Total de reacciones en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
        ];
    }
}
