<?php

namespace App\Filament\Resources\NoteResource\Widgets;

use App\Models\Note;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class NotesOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.note-resource.widgets.notes-overview';
    protected $listeners = [
        'redirectNote' => 'redirecN',
        'redirectLoked' => 'redirecL'
    ];
    public function redirecN(): array 
    { 
        return[Redirect()->route('filament.resources.notes.index')];
    }

    public function redirecL(): array 
    { 
        return[Redirect()->route('filament.resources.notes.locked')];
    }
    protected function getCards(): array
    {

        $notes = Note::count();
        $notes_loked = Note::where('status', 2)->count();
  
        return [
            Card::make(label: 'Posts', value:$notes)
            ->icon(icon: 'heroicon-o-collection')
            ->description(description: 'Total de posts en el sistema')
            ->descriptionIcon(icon: 'heroicon-o-trending-up')
            ->descriptionColor(color: 'success')
            ->color(color:'success' )
            ->chart([9, 15, 8, 6, 13, 8, 15])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => '$emitUp("redirectNote")',
            ]),

            Card::make(label: 'Posts Locked', value:$notes_loked)
            ->icon(icon: 'heroicon-o-collection')
            ->description(description: 'Total de post bloqueados')
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
