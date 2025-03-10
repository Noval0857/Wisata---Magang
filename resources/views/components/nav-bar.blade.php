<header class="bg-white sticky top-0 z-50">
    <nav class="px-4 lg:px-36 xl:px-40">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
            <!-- Logo dan nama aplikasi -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">WisBJM</span>
            </a>

            <!-- Navigasi -->
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <!-- Tombol user menu -->
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (auth()->check())
                        @php
                            $user = auth()->user();
                            // $userProfile = $user->profile;
                            $profileImage =
                                $user && $user->foto_profil
                                    ? asset('uploads/' . $user->foto_profil)
                                    : asset('images/profil-blank.webp');
                        @endphp
                        <img class="w-8 h-8 rounded-full" src="{{ $profileImage }}" alt="user photo">
                    @else
                        <img class="w-8 h-8 rounded-full" src="images/profil-blank.webp" alt="user photo">
                    @endif
                </button>
                <!-- Dropdown menu user -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <!-- Informasi user -->
                    <div class="px-4 py-3">
                        @if (auth()->check())
                            @php
                                $loggedInUser = auth()->user();
                            @endphp
                            @if ($loggedInUser)
                                <span
                                    class="block text-sm text-gray-900 dark:text-white">{{ $loggedInUser->nama_lengkap }}</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ $loggedInUser->email }}</span>
                            @else
                                <span class="block text-sm text-gray-900 dark:text-white">Guest</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ $loggedInUser->email }}</span>
                            @endif
                        @else
                            <span class="block text-sm text-gray-900 dark:text-white">Guest</span>
                            <span
                                class="block text-sm text-gray-500 truncate dark:text-gray-400">guest@example.com</span>
                        @endif
                    </div>
                    <!-- Menu dropdown -->
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <!-- Tampilkan menu sesuai status login -->
                        @if (auth()->check())
                            <li>
                                <a href="{{ route('profile-user') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Tombol untuk toggle dropdown user menu di versi mobile -->
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- Menu navigasi utama -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <!-- Menu admin hanya muncul jika user adalah admin -->
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <li>
                            <a href="{{ url('admin') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="page">Admin</a>
                        </li>
                    @endif
                    <!-- Menu navigasi lainnya -->
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            aria-current="page">Home</a>
                    </li>
                    <!-- Link dropdown dengan opsi untuk kategori -->
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Wisata
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu kategori wisata -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('wisata-category', $category->nama_kategori) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->nama_kategori }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <!-- Menu navigasi lainnya -->
                    {{-- <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</header>
