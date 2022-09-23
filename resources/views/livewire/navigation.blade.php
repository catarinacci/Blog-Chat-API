<style>
    #content{
        height: calc(100vh - 5rem);
    }
</style>

<header class="bg-indigo-900 sticky top-0">
    <div class="container flex items-center h-20 justify-between">
        <a class=" hover:text-indigo-400 text-green-400 cursor-pointer sm:order-first" href="">
            <svg class="h-10 w-10  " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>
        <a class="cursor-pointer order-first " href="">
            <img class="block w-50 h-20" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(4).jpg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
        </a>
        <button class=" hidden sm:block text-green-400 cursor-pointer hover:text-indigo-400 font-semibold outline outline-offset-4 outline-1 outline-indigo-500 rounded-lg   ">DEJA TU <br>COMENTARIO</button>
    </div>
</header>
