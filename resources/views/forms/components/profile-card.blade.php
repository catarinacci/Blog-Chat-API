<div class="flex justify-center justify-center" x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
    <div class="">
        <div class="flex justify-center justify-center w-32 mx-auto rounded-full overflow-hidden shadow-lg">
            <img class="w-32"src={{ $getItems()['profile_photo_path'] }} alt="profile-picture" />
        </div>
        <div class="p-6 text-center">
            <h4
                class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-100">
                {{ $getItems()['name'] }}
            </h4>
            <h4
                class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-100">
                {{ $getItems()['surname'] }}
            </h4>
            <h4
                class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-100">
                {{ $getItems()['nickname'] }}
            </h4>
            <h4
                class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-100">
                {{ $getItems()['email'] }}
            </h4>
        </div>
    </div>
</div>
