<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;

class UserCount extends BaseWidget
{

    

    protected function getCards(): array
    {
        $users = User::count();

        return [
            Card::make(label: 'Users', value:$users)
            ->icon(icon: 'heroicon-o-users')
            ->description(description: 'Total de usuarios en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
        ];
    }
}
