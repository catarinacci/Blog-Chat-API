<style>
    #navigation-menu {
        height: calc(100vh - 5rem);
    }
</style>

<header class="sticky top-0" x-data="{ open: false }">

    {{-- MENÚ --}}
    <div x-on:click.away="open=false" class="flex bg-indigo-900 ">
        <div class="container flex items-center h-20 justify-between">
            <a x-on:click="open = !open" class=" hover:text-indigo-400 text-green-400 cursor-pointer sm:order-first">
                <svg class="h-10 w-10  " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </a>
            <a class="cursor-pointer order-first " href="/">
                <img class="block w-50 h-20"
                    src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(4).jpg"
                    class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            </a>
            <button
                class=" hidden sm:block text-green-400 cursor-pointer hover:text-indigo-400 font-semibold outline outline-offset-4 outline-1 outline-indigo-500 rounded-lg   ">DEJA
                TU <br>COMENTARIO</button>
        </div>
        {{-- SIDEBAR --}}
        <nav :class="{ 'hidden': !open }"
            class=" fixed w-full sm:w-80 top-0 bottom-0 lg:left-0 p-2 overflow-y-auto transition duration-700 ease-in  text-center bg-gray-900 hidden ">
            <div class="grid grid-cols-3 items-center ">
                <div class="">
                    <img class="w-12 h-12"
                        src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(6)logo.jpg"
                        alt="">
                </div>
                <div class="col-span-1 w-full  ">
                    <p class="font-extrabold text-green-400 text-lg ">MENU</p>
                </div>
                <a x-on:click="open = false">
                    <div
                        class="col-span-1 w-full transition duration-700 ease-in text-2xl text-gray-300 hover:text-indigo-700">
                        <i class="bi bi-x-circle cursor-pointer -mr-111 "></i>
                    </div>
                </a>
            </div>

            <hr class="my-3  ">

            {{-- HOME --}}
            <div
                class=" sm:hidden mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">
                <i class="bi bi-person-lines-fill mr-4 ml-4 text-gray-300"></i>
                <p class="font-extrabold text-gray-300 text-lg">Deja tu comentario</p>
            </div>
            <div
                class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">
                <i class="bi bi-house-door-fill mr-4 ml-4 text-gray-300"></i>
                <p class="font-extrabold text-gray-300 text-lg"><a href="/">Home</a></p>
            </div>
            {{-- USER --}}
            <div x-data="{user : false}">
                <a x-on:click="user = !user">
                    <div
                        class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">
                        <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(1)->icon !!}</div>

                        <p class="font-extrabold text-gray-300 text-base">{{ $modules->find(1)->name }}</p>

                        <div class="ml-2" :class="{ 'block': user, 'rotate-180': user, }">
                            <span class="text-xl text-gray-300 rotate-0">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </a>

                    <div>
                        @foreach ($modules->find(1)->methods as $method)
                            <a x-on:click="open = false" href="/{{ $method->name }}">
                                <div :class="{ 'block': user, 'hidden': !user }"
                                class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li
                                    class="cursor-pointer p-2 transition duration-300 ease-in hover:bg-gray-700 rounded-md">
                                    {{ $method->name }}</li>
                            </div>

                        @endforeach
                    </div>
                </a>
            </div>
            {{-- NOTE --}}
            <div x-data="{note : false}">
                <a x-on:click="note = !note">
                    <div
                        class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">

                        <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(2)->icon !!}</div>

                        <p class="font-extrabold text-gray-300 text-base">{{ $modules->find(2)->name }}</p>

                        <div class="ml-2" :class="{ 'block': note, 'rotate-180': note, }">
                            <span class="text-xl text-gray-300 rotate-0">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a x-on:click="open = false" href="">
                    <div>
                        @foreach ($modules->find(2)->methods as $method)
                            <div :class="{ 'block': note, 'hidden': !note }"
                                class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li
                                    class="cursor-pointer p-2 transition duration-300 ease-in hover:bg-gray-700 rounded-md">
                                    {{ $method->name }}</li>
                            </div>
                        @endforeach
                    </div>
                </a>
            </div>
            {{-- COMMENT --}}
            <div x-data="{comment : false}">
                <a x-on:click="comment = !comment">
                    <div
                        class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">

                        <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(3)->icon !!}</div>

                        <p class="font-extrabold text-gray-300 text-base">{{ $modules->find(3)->name }}</p>

                        <div class="ml-2" :class="{ 'block': comment, 'rotate-180': comment, }">
                            <span class="text-xl text-gray-300 rotate-0">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>>
                    </div>
                </a>
                <a x-on:click="open = false" href="">
                    <div>
                        @foreach ($modules->find(3)->methods as $method)
                            <div :class="{ 'block': comment, 'hidden': !comment }"
                                class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li
                                    class="cursor-pointer p-2 transition duration-300 ease-in hover:bg-gray-700 rounded-md">
                                    {{ $method->name }}</li>
                            </div>
                        @endforeach
                    </div>
                </a>
            </div>
            {{-- REACTION --}}
            <div x-data="{reaction : false}">
                <a x-on:click="reaction = !reaction">
                    <div
                        class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">

                        <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(4)->icon !!}</div>

                        <p class="font-extrabold text-gray-300 text-base">{{ $modules->find(4)->name }}</p>

                        <div class="ml-2" :class="{ 'block': reaction, 'rotate-180': reaction, }">
                            <span class="text-xl text-gray-300 rotate-0">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a x-on:click="open = false" href="">
                    <div>
                        @foreach ($modules->find(4)->methods as $method)
                            <div :class="{ 'block': reaction, 'hidden': !reaction }"
                                class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li
                                    class="cursor-pointer p-2 transition duration-300 ease-in hover:bg-gray-700 rounded-md">
                                    {{ $method->name }}</li>
                            </div>
                        @endforeach
                    </div>
                </a>
            </div>
            {{-- NOTIFICATION --}}
            <div x-data="{notification : false}">
                <a x-on:click="notification = !notification">
                    <div
                        class=" mt-6 flex items-center text-2xl rounded-md transition duration-500 ease-in cursor-pointer hover:bg-indigo-700">

                        <div class="text-gray-300 mr-4 ml-4"> {!! $modules->find(5)->icon !!}</div>

                        <p class="font-extrabold text-gray-300 text-base">{{ $modules->find(5)->name }}</p>

                        <div class="ml-2" :class="{ 'block': notification, 'rotate-180': notification, }">
                            <span class="text-xl text-gray-300 rotate-0">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a x-on:click="open = false" href="">
                    <div>
                        @foreach ($modules->find(5)->methods as $method)
                            <div :class="{ 'block': notification, 'hidden': !notification }"
                                class="leading-7 text-left text-base text-gray-300 mt-1 w-4/5 mx-auto hidden  ">
                                <li
                                    class="cursor-pointer p-2 transition duration-300 ease-in hover:bg-gray-700 rounded-md">
                                    {{ $method->name }}</li>
                            </div>
                        @endforeach
                    </div>
                </a>
            </div>
        </nav>
    </div>
</header>

<script>
    function dropdown() {
        return open: false,
            show() {
                if (this.open) {
                    //cierra el menu
                    this.open: false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                } else {
                    //abre el menu
                    this.open: true;
                    document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                }
            }
    }

    function close_sidebar() {
        return open: false,
            // document.getElementById('sidebar').classList.add('hidden');
    }
</script>
