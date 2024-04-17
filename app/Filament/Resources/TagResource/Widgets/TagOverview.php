<?php

namespace App\Filament\Resources\TagResource\Widgets;

use App\Models\Tag;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TagOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.tag-resource.widgets.tag-overview';

    protected $listeners = [

        'redirectLoked' => 'redirecL'
    ];


    public function redirecL(): array 
    { 
        //return[];
        return[Redirect()->route('filament.resources.tags.loked')];
    }

    protected function getCards(): array
    {

        $tags = Tag::count();
        $tags_loked = Tag::where('status', 2)->count();
  
        return [
            Card::make(label: 'Tags', value:$tags)
            ->icon(icon: 'heroicon-o-collection')
            ->description(description: 'Total de tags en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15]),
            // ->extraAttributes([
            //     'class' => 'cursor-pointer',
            //     'wire:click' => '$emitUp("redirectNote")',
            // ]),

            Card::make(label: 'Tags Locked', value:$tags_loked)
            ->icon(icon: 'heroicon-o-collection')
            ->description(description: 'Total de tags bloqueados')
            ->descriptionIcon(icon: 'heroicon-o-trending-down')
            ->descriptionColor(color: 'danger')
            ->color(color:'danger' )
            ->chart([9, 15, 8, 6, 13, 8, 15])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => '$emitUp("redirectLoked")',
            ]),
          
        ];
    }
}
