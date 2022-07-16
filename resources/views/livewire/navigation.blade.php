

<header class="bg-indigo-900 sticky top-0">
    <div class="container flex items-center h-20 justify-between ">
        <div class="flex flex-col items-center justify-center  text-green-400 cursor-pointer  font-semibold" href="">
            <svg class="h-6 w-6 hover:text-indigo-400 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

                {{-- <h1 class="border-indigo-500 border-8">MENÚ</h1> --}}
                <div class=" text-lg hover:text-indigo-400 ">
                    <p class="font-sarp  ">MENU</p>
                    {{-- <span class="font-sarp outline-4 border-2 border-black ">MENÚ</span> --}}
                </div>

        </div>
        {{-- <x-jet-application-mark class="block h-16 w-auto"/> --}}
        <div >
            <a class="cursor-pointer" href="">
            <img class="w-50 h-20" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(4).jpg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            </a>
        </div>
            <div class="flex flex-col items-center order-last justify-center text-green-400 cursor-pointer rounded-lg hover:bg-indigo-400 font-semibold ">
                <button class="outline outline-offset-4 outline-1 outline-indigo-500 rounded-lg   ">DEJA TU <br>COMENTARIO</button>
            </div>

    </div>
</header>
