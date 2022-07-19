<style>
    #content{
        height: calc(100vh - 5rem);
    }
</style>

<header x-data="{ open: false}">

    {{-- Menu --}}
    <div x-on:click.away="open=false" class="bg-indigo-900 sticky top-0">
        <div class="container flex items-center h-20 justify-between ">
            {{-- <a x-on:click="$ref.sidebar.classList.remove('hidden')"> --}}
            <a x-on:click="open = !open" class="hover:text-indigo-400">
                <div class="flex flex-col items-center justify-center  text-green-400 cursor-pointer  font-semibold" href="">
                    <svg class="h-10 w-10  " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                        {{-- <h1 class="border-indigo-500 border-8">MENÚ</h1> --}}
                        {{-- <div class=" text-lg hover:text-indigo-400 ">
                            <p class="font-sarp  ">MENU</p> --}}
                            {{-- <span class="font-sarp outline-4 border-2 border-black ">MENÚ</span> --}}
                        {{-- </div> --}}

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
        <div>

        </div>
        {{-- Sidebar --}}
            <nav
            {{-- x-show = "open" --}}
            {{-- :class="{'block' : open, 'hidden' : !open }" --}}
            :class="{'block' : open, 'hidden' : !open, 'w-0':!open }"
            class=" fixed top-0 bottom-0 lg:left-0 p-2 overflow-y-auto duration-300 w-80 text-center bg-gray-900 hidden ">

            <div >
                <div class="grid grid-cols-3 items-center ">
                    <div class="  w-full">
                        <img class="w-12 h-12" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(6)logo.jpg" alt="">
                    </div>
                    <div class="col-span-1 w-full  ">
                        <p class="font-extrabold text-green-400 text-xl ">MENU</p>
                    </div>
                    <a x-on:click="open = false">
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
                {{-- USER --}}
                <div x-data ="{user : false}">
                    <a x-on:click = "user = !user">
                        <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">
                            {{-- <i class="bi bi-house-door-fill mr-4 ml-4 text-gray-300"></i> --}}
                            <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(1)->icon!!}</div>

                            <p class="font-extrabold text-gray-300 text-lg">{{ $modules->find(1)->name }}</p>

                                <span  x-ref="arrow" :class="{'block' : user, 'rotate-0' : !user}" class="text-xl text-gray-300 ml-2 rotate-180">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                        <div x-ref="submenu">
                            @foreach ( $modules->find(1)->methods as $method )
                            <div :class="{'block' : user, 'hidden' : !user}"  class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                            </div>
                        @endforeach
                        </div>
                    {{-- @endforeach --}}
                </div>
                {{-- NOTE --}}
                <div x-data ="{note : false}">
                    <a x-on:click = "note = !note">
                        <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">

                            <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(2)->icon!!}</div>

                            <p class="font-extrabold text-gray-300 text-lg">{{ $modules->find(2)->name }}</p>

                                <span  x-ref="arrow" :class="{'block' : note, 'rotate-0' : !note}" class="text-xl text-gray-300 ml-2 rotate-180">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                        <div x-ref="submenu">
                            @foreach ( $modules->find(2)->methods as $method )
                            <div :class="{'block' : note, 'hidden' : !note}"  class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                            </div>
                        @endforeach
                        </div>
                    {{-- @endforeach --}}
                </div>
                {{-- COMMENT --}}
                <div x-data ="{comment : false}">
                    <a x-on:click = "comment = !comment">
                        <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">

                            <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(3)->icon!!}</div>

                            <p class="font-extrabold text-gray-300 text-lg">{{ $modules->find(3)->name }}</p>

                                <span  x-ref="arrow" :class="{'block' : comment, 'rotate-0' : !comment}" class="text-xl text-gray-300 ml-2 rotate-180">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                        <div x-ref="submenu">
                            @foreach ( $modules->find(3)->methods as $method )
                            <div :class="{'block' : comment, 'hidden' : !comment}"  class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                            </div>
                        @endforeach
                        </div>
                    {{-- @endforeach --}}
                </div>
                {{-- REACTION --}}
                <div x-data ="{reaction : false}">
                    <a x-on:click = "reaction = !reaction">
                        <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">

                            <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(4)->icon!!}</div>

                            <p class="font-extrabold text-gray-300 text-lg">{{ $modules->find(4)->name }}</p>

                                <span  x-ref="arrow" :class="{'block' : reaction, 'rotate-0' : !reaction}" class="text-xl text-gray-300 ml-2 rotate-180">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                        <div x-ref="submenu">
                            @foreach ( $modules->find(4)->methods as $method )
                            <div :class="{'block' : reaction, 'hidden' : !reaction}"  class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                            </div>
                        @endforeach
                        </div>
                    {{-- @endforeach --}}
                </div>
                {{-- NOTIFICATION --}}
                <div x-data ="{notification : false}">
                    <a x-on:click = "notification = !notification">
                        <div  class=" mt-6 flex items-center text-2xl rounded-md duration-300 cursor-pointer hover:bg-indigo-700">

                            <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(5)->icon!!}</div>

                            <p class="font-extrabold text-gray-300 text-lg">{{ $modules->find(5)->name }}</p>

                                <span  x-ref="arrow" :class="{'block' : notification, 'rotate-0' : !notification}" class="text-xl text-gray-300 ml-2 rotate-180">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                        <div x-ref="submenu">
                            @foreach ( $modules->find(5)->methods as $method )
                            <div :class="{'block' : notification, 'hidden' : !notification}"  class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li class="cursor-pointer p-2 hover:bg-gray-700 rounded-md">{{ $method->name }}</li>
                            </div>
                        @endforeach
                        </div>
                    {{-- @endforeach --}}
                </div>
            </nav>
            {{-- <div id="content" class=" overflow-y-auto duration-300 w-full text-center bg-gray-900">
                <div class=""></div>
            </div> --}}
    </div>

</header>

<script>
    function dropdown(){
        document.querySelector('#submenu').classList.toggle('block')
    }
    dropdown()
</script>
