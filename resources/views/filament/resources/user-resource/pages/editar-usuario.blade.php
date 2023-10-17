<x-filament::page>
    {{-- <form wire:submit.prevent="submit">
        {{ $this->form }}
        
        <button type="submit">
            Submit
        </button>
    </form> --}}
    <x-filament::form wire:submit="save">
        {{ $this->form }}
 
        <x-filament::form.actions 
            :actions="$this->getFormActions()"
        /> 
    </x-filament::form>
</x-filament::page>
