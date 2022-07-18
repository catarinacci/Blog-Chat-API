<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Module;

class MenuSidebar extends Component
{
    public function render()
    {
        $modules = Module::all();

        return view('livewire.menu-sidebar', compact('modules'));
    }
}
