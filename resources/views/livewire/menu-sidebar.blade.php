<style>
    #content{
        height: calc(100vh - 5rem);
    }
</style>

<header x-data="{ open: false}">

    {{-- Menu --}}
    <div class="bg-indigo-900 sticky top-0">
        <div class="container flex items-center h-20 justify-between ">
            {{-- <a x-on:click="$ref.sidebar.classList.remove('hidden')"> --}}
            <a x-on:click="open = !open" class="hover:text-indigo-400">
                <div class="flex flex-col items-center justify-center  text-green-400 cursor-pointer  font-semibold" href="">
                    <svg class="h-6 w-6  " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                        {{-- <h1 class="border-indigo-500 border-8">MENÚ</h1> --}}
                        <div class=" text-lg hover:text-indigo-400 ">
                            <p class="font-sarp  ">MENU</p>
                            {{-- <span class="font-sarp outline-4 border-2 border-black ">MENÚ</span> --}}
                        </div>

                </div>
            </a>

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

        {{-- Sidebar --}}
            <nav
            {{-- x-show = "open" --}}
            {{-- :class="{'block' : open, 'hidden' : !open }" --}}
            :class="{'block' : open, 'hidden' : !open, 'w-0':!open }"
            class=" fixed top-0 bottom-0 lg:left-0 p-2 overflow-y-auto duration-300 w-80 text-center bg-gray-900 hidden ">

            <div>
                <div class="grid grid-cols-3 items-center ">
                    <div class="  w-full">
                        <img class="w-12 h-12" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(6)logo.jpg" alt="">
                    </div>
                    <div class="col-span-1 w-full  ">
                        <p class="font-extrabold text-green-400 text-xl ">MENU</p>
                    </div>
                    <a x-on:click="open = false" href="">
                        <div class="col-span-1 w-full  text-2xl text-gray-300 hover:text-indigo-700">
                            <i class="bi bi-x-circle cursor-pointer -mr-111 "></i>
                        </div>
                    </a>
                </div>

                <hr class="my-3  ">

                <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">
                    <i class="bi bi-house-door-fill mr-4 ml-4 text-gray-300"></i>
                    <p class="font-extrabold text-gray-300 text-xl">Home</p>
                </div>
                <div >
                    @foreach ($modules as $module )
                    <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">
                        {{-- <i class="bi bi-house-door-fill mr-4 ml-4 text-gray-300"></i> --}}
                        <div class="text-gray-300 mr-4 ml-4"> {!!$module->icon!!}</div>

                        <p class="font-extrabold text-gray-300 text-lg">{{ $module->name }}</p>
                        <a x-on:click="open = false">
                            <span id="arrow" :class="{'block' : open, 'rotate-180':!open}" class="text-xl text-gray-300 rotate-0 ml-2 ">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>

                    </div>
                    @foreach ( $module->methods as $method )
                        <div id="submenu" class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden ">
                            <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                        </div>
                    @endforeach

                @endforeach
                </div>
            </nav>
            <div id="content" class=" overflow-y-auto duration-300 w-full text-center bg-gray-900">
                <div class=""></div>
            </div>
    </div>

</header>

<script>
    function dropdown(){
        document.querySelector('#submenu').classList.toggle('block')
    }
    dropdown()
</script>
