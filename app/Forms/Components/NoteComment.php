<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class NoteComment extends Component
{
    protected string $view = 'forms.components.note-comment';

    protected array $items = [];
    protected $itemsc ;
    protected $itemsl ;

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
}
