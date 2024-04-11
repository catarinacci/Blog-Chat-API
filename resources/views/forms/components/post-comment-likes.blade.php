
    @php
    $likes = $getItems();
    //dd($likes);
@endphp


<div class="items-center gap-3 mt-8 group">
  
    @php
    
            $user = App\Models\User::where('id', $likes->user_id)->first();
            //dd($user);
    @endphp
    <div class="flex">
        <p>{{ $likes->mensaje}}</p> &nbsp;&nbsp;User:&nbsp; <p> {{ $user->name }}</p> &nbsp;&nbsp;Id:&nbsp; {{ $user->id }} 
        <br>
        <br>
    </div>
   
</div>


