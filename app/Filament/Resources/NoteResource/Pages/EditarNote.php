<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use Filament\Resources\Pages\Page;

class EditarNote extends Page
{
    protected static string $resource = NoteResource::class;

    protected static string $view = 'filament.resources.note-resource.pages.editar-note';

    protected static ?string $title = 'Edit Posts';
}
