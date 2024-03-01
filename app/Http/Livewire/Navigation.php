<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $modules = Module::all();

        return view('livewire.navigation', compact('modules'));
    }
}
