<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use Filament\Resources\Pages\Page;

class Loked extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.loked';
    protected static ?string $title = 'List Posts Locked';
}
