@php
    $note = $getItems();
@endphp

<div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border shadow-lg">
    <div
        class="relative mx-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
        <img src={{ $note->image_note_path }} alt="ui/ux review check" />
        <div
            class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60">
        </div>
    </div>
    <div class="p-6">
        <div class="flex items-center justify-between mb-3 text-gray-700 shadow-lg">
            <h5 class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                {{ $note->title }}
            </h5>
        </div>
        <p class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
            {{ $note->content }}
        </p>
    </div>
</div>
