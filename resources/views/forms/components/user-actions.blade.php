 @php
 $i = $getItems()['user_id']; 
 
 @endphp
 
   

<div class="grid grid-cols-3 gap-3">
    <div class="mx-auto grid grid-rows-2 grid-flow-col gap-2">
        <a href="{{ route('filament.resources.users.posts', ['record' => $i])}}"><div><p class=" text-l text-center">Posts: {{ $getItems()['posts'] }} </p></div>
            <div class=""><p class=" text-l text-center">VER</p></div></a>
    </div> 
    {{-- <div class="mx-auto grid grid-rows-2 grid-flow-col gap-2">
        <a href="{{ route('filament.resources.users.comments', ['record' => $i])}}"><div><p class=" text-l text-center">Comments: {{ $getItems()['comments'] }} </p></div>
            <div class=""><p class=" text-l text-center">VER</p></div></a>
    </div> 
    <div class="mx-auto grid grid-rows-2 grid-flow-col gap-2">
        <a href="{{ route('filament.resources.users.reactions', ['record' => $i])}}"><div><p class=" text-l text-center">Reactions: {{ $getItems()['reactions'] }} </p></div>
            <div class=""><p class=" text-l text-center">VER</p></div></a>
    </div>  --}}
  </div>

