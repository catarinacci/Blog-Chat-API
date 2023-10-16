<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;

class ListUsers extends Component implements Tables\Contracts\HasTable 
{

    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        return User::query();
    } 

    protected function getTableColumns(): array 
    {
        return [ 
            Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
            Tables\Columns\ImageColumn::make('profile_photo_path')->disk('s3')->circular(),
            Tables\Columns\TextColumn::make('email_verified_at'),
            Tables\Columns\TextColumn::make('status')
        ]; 
    }


    public function render()
    {
        return view('livewire.list-users');
    }
}
