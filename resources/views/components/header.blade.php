<!-- start header -->
<header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">

    <div class="flex flex-wrap items-center justify-between py-6">
        <div class="w-1/2 md:w-auto">
            <a href="{{ url('') }}" class="text-white font-bold text-2xl">
                WisBJM
            </a>
        </div>

        <div class="block md:hidden">
            <button id="menu-btn" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div class="hidden md:block w-full md:w-auto" id="menu">
            <nav
                class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none">
                <ul class="md:flex items-center">
                    {{-- TODO untuk level Akses "ADMIN" --}}
                    @if (auth()->check() && auth()->user()->level == 'admin')
                        <button class="md:mr-4">
                            <a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold"
                                href="{{ route('admin') }}">Admin</a>
                        </button>
                    @endif
                    <li><a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold hover:text-sky-500"
                            href="{{ url('/') }}">Home</a></li>
                    <li class="md:ml-4"><a class="py-2 inline-block md:text-white md:px-2 font-semibold hover:text-sky-500"
                            href="{{ url('about') }}">About</a></li>
                    <li class="md:ml-4 relative" x-data="{ open: false }">
                        <a @click="open = !open"
                            class="py-2 inline-block md:text-white md:px-2 font-semibold cursor-pointer">Wisata</a>
                        <ul x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute left-0 mt-2 space-y-2 bg-white shadow-lg rounded-md">
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">Alam</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">Budaya</a>
                            </li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-gray-200" href="#">Kuliner</a>
                            </li>
                        </ul>
                    </li>
                    <li class="md:ml-4"><a class="py-2 inline-block md:text-white md:px-2 font-semibold hover:text-sky-500"
                            href="#">Rekomendasi</a></li>
                    <li class="md:ml-4 md:hidden lg:block"><a
                            class="py-2 inline-block md:text-white md:px-2 font-semibold hover:text-sky-500" href="#">Informasi</a>
                    </li>
                    <li class="md:ml-4"><a class="py-2 inline-block md:text-white md:px-2 font-semibold hover:text-sky-500"
                            href="#">Contact</a></li>
                    @if (auth()->check())
                        <li class="md:ml-6 mt-3 md:mt-0">
                            <a class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded hover:bg-sky-500"
                                href="{{ route('logout') }}">Log Out</a>
                        </li>
                    @else
                        <li class="md:ml-6 mt-3 md:mt-0">
                            <a class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded hover:bg-sky-500"
                                href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- end header -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.getElementById('menu-btn').addEventListener('click', function () {
        var menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
        menu.classList.toggle('block');
    });
</script>
