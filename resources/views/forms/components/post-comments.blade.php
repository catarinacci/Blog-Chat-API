
@php
    //$i = $getItems();
    $comments = $getItemsc();
    //$reactions = $getItemsl();
    //dd($a[0]->id)
    //dd($getItemsc())

@endphp

<div class="inline-flex flex-wrap items-center gap-3 mt-8 group">
    @foreach ($comments as $item)
        <p>{{ $item['content'] }}</p> 
        @php
            $reactionms = App\Models\Reactionm::where('reactionmable_id', $item['id'])->get();
            //dd($reactionms);
        @endphp
        <x-filament::dropdown>
            <x-slot name="trigger">
                <x-filament::button>
                    Likes ( {{ $reactionms->count()}} )
                </x-filament::button>
            </x-slot>
            @if ($reactionms->count() != 0)
                @foreach ($reactionms as $item)
                    <x-filament::dropdown.list href="{{ route('filament.resources.notes.show-likes', ['record' => $item['id']])}}" tag="a">
                        <x-filament::dropdown.list.item >
                            {{ $item['mensaje'] }}
                        </x-filament::dropdown.list.item>
                    </x-filament::dropdown.list>
                @endforeach
            @else
                
                <x-filament::dropdown.list>
                    <x-filament::dropdown.list.item >
                        No hay Likes
                    </x-filament::dropdown.list.item>
                </x-filament::dropdown.list>
     
            @endif              
        </x-filament::dropdown>

    @endforeach
</div>
        
    

