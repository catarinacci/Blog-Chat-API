<div class=" mx-auto overflow-hidden shadow-lg">
    <h3>Change Image</h3>
    <div class=" ">
        @foreach($getItems() as $term => $description)

        <img class="" src={{ $description}} alt="">
    
        @endforeach
    </div>
   
  </div>