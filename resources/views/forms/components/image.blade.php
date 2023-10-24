
<div class="max-w-sm rounded-full overflow-hidden shadow-lg">
    <div class="m-20">
        @foreach($getItems() as $term => $description)

        <img class="w-full " src={{ $description}} alt="">
    
        @endforeach
    </div>
   
  </div>
