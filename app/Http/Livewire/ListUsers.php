<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;

class ListUsers extends Component 
{

 

    public function render()
    {
        return view('livewire.list-users');
    }
}
