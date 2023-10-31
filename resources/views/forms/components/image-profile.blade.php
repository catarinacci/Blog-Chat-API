<div class="w-32 mx-auto rounded-full overflow-hidden shadow-lg">
    <div class=" ">
        @foreach($getItems() as $term => $description)

        <img class="" src={{ $description}} alt="">
    
        @endforeach
    </div>
   
  </div>
