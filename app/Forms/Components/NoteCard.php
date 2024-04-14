<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class NoteCard extends Component
{
    protected string $view = 'forms.components.note-card';

    protected array $items = [];
    protected $itemsc ;
    protected $itemsl ;
    protected $itemst ;

    public static function make(): static
    {
        return new static();
    }

    public function itemsc($items): static
    {
        $this->itemsc = $items;
        
        return $this;
    }
    public function getItemsc()
    {
        return $this->itemsc;
    }

    public function itemsl($items): static
    {
        $this->itemsl = $items;
        
        return $this;
    }
    public function getItemsl()
    {
        return $this->itemsl;
    }

    public function itemst($items): static
    {
        $this->itemst = $items;
        
        return $this;
    }
    public function getItemst()
    {
        return $this->itemst;
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
