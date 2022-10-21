<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowMethods extends Component
{
    public $module;

    public function mount($module='home'){
        $this->module = $module;

    }
    public function render()
    {
        return view('livewire.show-methods');
    }
}
