<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms;
use Illuminate\Contracts\View\View;

//use Livewire\Component;

class Image extends Component 
{
    protected string $view = 'forms.components.image';


    public $profile_photo_path;
    public $record;
    public $user;
    public $attributes ;
    



    protected array $items = [];

    public static function make(): static
    {
        return new static();
    }

    public function items(array $items): static
    {
        $this->items = $items;
        
        return $this;
    }


    public function getItems(): array
    {
        return $this->items;
    }
    // public function items(array $items): static
    // {
    //     $this->items = $items;
        
    //     return $this->items;
    // }

    // final public function __construct(string $name)
    // {
    //     $this->name($name);
    //     $this->statePath($name);
    // }


    // public static function make(string $user): static
    // {
    //     // $static = app(static::class, ['name' => $user]);
    //     // $static->configure();
    //     // //dd($user);
    //     // //return $static;
                
    //     // return new static($user);
    // }

    // public static function make(): View
    // {
    //     return view('forms.components.image');
    // }
}
