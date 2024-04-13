<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class UserReactionComment extends Component
{
    protected string $view = 'forms.components.user-reaction-comment';

    protected $items ;

    public static function make(): static
    {
        return new static();
    }
    public function items($items): static
    {
        $this->items = $items;
        
        return $this;
    }
    public function getItems()
    {
        return $this->items;
    }
}
