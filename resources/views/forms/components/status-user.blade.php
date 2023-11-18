{{-- <div class=" ">
    <div class="  ">

        @foreach($getItems() as $term => $description)

        @if ($description == 1)

            <p class=" text-l">User: ACTIVE</p>
        
        @else

            <p class="text-l">User: LOCKED</p>

        @endif

        @endforeach
    </div>
   
  </div> --}}

<div class="grid grid-cols-2 gap-2">

    @if($getItems()['status'] == 1)
        <div class="mx-auto"><p class=" text-l">User: ACTIVE</p></div>
    @else
        <div class="mx-auto"><p class="text-l">User: LOCKED</p></div>
    @endif

    @if($getItems()['email_verified_at'])
    <div class="mx-auto"><p class=" text-l">Email: VERIFIED</p></div>
    @else
    <div class="mx-auto"><p class="text-l">Email: UNVERIFIED</p></div>
    @endif
</div>