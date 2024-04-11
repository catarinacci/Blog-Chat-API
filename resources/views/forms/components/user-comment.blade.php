@php
    //$i = $getItems();
    $comment = $getItems();
    //$reactions = $getItemsl();
    //dd($a[0]->id)
    //dd($comment)

@endphp

<div class="inline-flex flex-wrap items-center gap-3 mt-8 group">
   
        <p>{{ $comment->content }}</p> 
        @php
            $reactionms = App\Models\Reactionm::where('reactionmable_id', $comment->id)->get();
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
                    <x-filament::dropdown.list >
                        <x-filament::dropdown.list.item href="{{ route('filament.resources.notes.show-comment-likes', ['record' => $item['id']])}}" tag="a">
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

  
</div>
        