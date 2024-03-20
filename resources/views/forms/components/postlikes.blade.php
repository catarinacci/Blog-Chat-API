@php
    $likes = $getItems();
    //dd($likes);
@endphp


<div class="items-center gap-3 mt-8 group">
    @foreach ($likes as $item)
    @php
            $user = App\Models\User::where('id', $item['user_id'])->first();
            //dd($user);
    @endphp
    <div class="flex">
        <p>{{ $item['mensaje']}}</p> &nbsp;&nbsp;User:&nbsp; <p> {{ $user->name }}</p> &nbsp;&nbsp;Id:&nbsp; {{ $user->id }} 
        <br>
        <br>
    </div>
    @endforeach
</div>
