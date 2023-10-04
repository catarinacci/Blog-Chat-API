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
            Card::make(label: 'Users', value:$users),
        ];
    }
}
