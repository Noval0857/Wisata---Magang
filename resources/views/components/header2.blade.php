<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- start header -->
    <header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">

        <div class="flex flex-wrap items-center justify-between py-6">
            <div class="w-1/2 md:w-auto">
                <a href="{{ url('') }}" class="text-black font-bold text-2xl">
                    WisBJM
                </a>
            </div>

            <div id="collapseMenu" class='hidden lg:flex lg:items-center'>

                <ul
                    class='lg:flex lg:gap-x-10 max-lg:space-y-3 max-lg:fixed max-lg:bg-slate-500 max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <li
                            class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                            <a href='{{ url('admin') }}' class='text-black block text-[15px]'>Admin</a>
                        </li>
                    @endif
                    <li
                        class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                        <a href='{{ url('/') }}' class='text-black block text-[15px]'>Home</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative group lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'
                        id="dropdown">
                        <a href='javascript:void(0)' class='text-black block text-[15px]'>Wisata</a>
                        <ul class="group-hover:block absolute bg-slate-500 lg:mt-6 lg:shadow-lg lg:rounded-lg transition-opacity duration-300 opacity-0 group-hover:opacity-100"
                            id="dropdownmenu">
                            <li class="py-2 px-4 lg:hover:bg-slate-600">
                                <a href="#" class="text-black block text-[15px]">Alam</a>
                            </li>
                            <li class="py-2 px-4 lg:hover:bg-slate-600">
                                <a href="#" class="text-black block text-[15px]">Budaya</a>
                            </li>
                            <li class="py-2 px-4 lg:hover:bg-slate-600">
                                <a href="#" class="text-black block text-[15px]">Kuliner</a>
                            </li>
                        </ul>
                    </li>


                    <li
                        class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                        <a href='javascript:void(0)' class='text-black block text-[15px]'>Support</a>
                    </li>
                    <li
                        class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                        <a href='javascript:void(0)' class='text-black block text-[15px]'>Account</a>
                    </li>
                    <li
                        class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                        <a href='javascript:void(0)' class='text-black block text-[15px]'>Places</a>
                    </li>
                    <li
                        class='max-lg:border-b max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute lg:after:bg-white lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-6 lg:after:transition-all lg:after:duration-300'>
                        <a href='javascript:void(0)' class='text-black block text-[15px]'>Contact</a>
                    </li>
                </ul>
            </div>

            <div class='flex items-center max-sm:ml-auto space-x-6'>
                <ul>
                    <li
                        class="relative px-1 after:absolute after:w-full after:h-[2px] after:block after:top-8 after:left-0 after:transition-all after:duration-300">
                        <svg id="toggleUserMenu" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                            class="cursor-pointer hover:fill-white" viewBox="0 0 512 512">
                            <path
                                d="M437.02 74.981C388.667 26.629 324.38 0 256 0S123.333 26.629 74.98 74.981C26.629 123.333 0 187.62 0 256s26.629 132.667 74.98 181.019C123.333 485.371 187.62 512 256 512s132.667-26.629 181.02-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.667-74.98-181.019zM256 482c-66.869 0-127.037-29.202-168.452-75.511C113.223 338.422 178.948 290 256 290c-49.706 0-90-40.294-90-90s40.294-90 90-90 90 40.294 90 90-40.294 90-90 90c77.052 0 142.777 48.422 168.452 116.489C383.037 452.798 322.869 482 256 482z"
                                data-original="#000000" fill="black" />
                        </svg>
                        <div id="userMenu"
                            class="bg-black z-20 shadow-md py-6 px-6 sm:min-w-[320px] max-sm:min-w-[250px] absolute right-0 top-10 hidden">
                            @if (auth()->check())
                                <a href="{{ route('logout') }}"
                                    class="bg-transparent border-2 border-gray-300 hover:border-black rounded px-4 py-2.5 mt-10 text-sm text-white font-semibold">
                                    LOGOUT
                                </a>
                                <hr class="border-b-0 my-4" />
                                <ul class="space-y-1.5">
                                    <li><a href='{{ url('profile-user') }}'
                                            class="text-sm text-gray-500 hover:text-black">Profil</a>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-transparent border-2 border-gray-300 hover:border-black rounded px-4 py-2.5 mt-10 text-sm text-white font-semibold">
                                    LOGIN / SIGNUP
                                </a>
                            @endif



                        </div>
                    </li>
                </ul>

                <button id="toggleOpen" class='lg:hidden ml-7'>
                    <svg class="w-7 h-7" fill="#00000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-black p-3 hidden'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </button>

            </div>

        </div>
    </header>


    <script>
        var toggleOpen = document.getElementById('toggleOpen');
        var toggleClose = document.getElementById('toggleClose');
        var collapseMenu = document.getElementById('collapseMenu');
        var toggleUserMenu = document.getElementById('toggleUserMenu');
        var userMenu = document.getElementById('userMenu');

        function handleClick() {
            if (collapseMenu.classList.contains('block')) {
                collapseMenu.classList.remove('block');
                collapseMenu.classList.add('hidden');
                toggleClose.classList.add('hidden');
            } else {
                collapseMenu.classList.remove('hidden');
                collapseMenu.classList.add('block');
                toggleClose.classList.remove('hidden');
            }
        }

        function handleUserMenuClick() {
            if (userMenu.classList.contains('block')) {
                userMenu.classList.remove('block');
                userMenu.classList.add('hidden');
            } else {
                userMenu.classList.remove('hidden');
                userMenu.classList.add('block');
            }
        }

        toggleOpen.addEventListener('click', handleClick);
        toggleClose.addEventListener('click', handleClick);
        toggleUserMenu.addEventListener('click', handleUserMenuClick);
    </script>

</body>

</html>
