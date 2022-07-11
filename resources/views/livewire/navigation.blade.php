<header class="bg-indigo-900">
    <div class="container flex items-center h-20">
        <a class="flex flex-col items-center justify-center  bg-opacity-40 text-green-400 cursor-pointer font-semibold" href="">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>
                MENÚ
            </span>
        </a>
        {{-- <x-jet-application-mark class="block h-16 w-auto"/> --}}
        <div >
            <img class="w-50 h-20" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(3).jpg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
        </div>
    </div>
</header>
