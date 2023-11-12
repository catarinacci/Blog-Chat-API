<div class="w-32 mx-auto ">
    <div class="  ">
        @foreach($getItems() as $term => $description)

        @if ($description == 1)

            <p class=" text-3xl">ACTIVE</p>
        
        @else

            <p class="text-3xl">LOCKED</p>

        @endif

        @endforeach
    </div>
   
  </div>