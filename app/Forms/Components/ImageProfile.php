<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class ImageProfile extends Component
{
    protected string $view = 'forms.components.image-profile';

   
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
}
