@php
    $comment = $getItems();

@endphp

<div class="inline-flex flex-wrap items-center gap-3 mt-8 group" >
  <p>{{ $comment->content }}</p>
</div>
