<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;

class UsersOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.user-resource.widgets.users-overview';

    protected function getCards(): array
    {
        $users = User::count();
        $users_unverified = User::where('email_verified_at', null)->count();
        $users_loked = User::where('status', 2)->count();
  
        return [
            Card::make(label: 'Users', value:$users)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),

            Card::make(label: 'Users Unverified', value:$users_unverified)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'warning')
            ->color(color:'warning' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),

            Card::make(label: 'Users Loked', value:$users_loked)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'danger')
            ->color(color:'danger' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
            

        ];
    }
}
