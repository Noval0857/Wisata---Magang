<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        {{-- <img alt="Midone - HTML Admin Template" class="w-6" src="">
        <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span> --}}
        <h2 class="hidden xl:block text-white text-lg ml-3"> WisBJM </h2>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ url('admin') }}" class="side-menu {{ Request::is('admin') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180">
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ url('data-wisata') }}"
                class="side-menu {{ Request::is('data-wisata') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    {{-- <i data-lucide="navigation"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pinned">
                        <path d="M18 8c0 4.5-6 9-6 9s-6-4.5-6-9a6 6 0 0 1 12 0" />
                        <circle cx="12" cy="8" r="2" />
                        <path
                            d="M8.835 14H5a1 1 0 0 0-.9.7l-2 6c-.1.1-.1.2-.1.3 0 .6.4 1 1 1h18c.6 0 1-.4 1-1 0-.1 0-.2-.1-.3l-2-6a1 1 0 0 0-.9-.7h-3.835" />
                    </svg>
                </div>
                <div class="side-menu__title"> Data Wisata </div>
            </a>
        </li>
        <li>
            <a href="{{ url('data-user') }}"
                class="side-menu {{ Request::is('data-user') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title"> Data User </div>
            </a>
        </li>
        <li>
            <a href="{{ url('foto-wisata') }}"
                class="side-menu {{ Request::is('foto-wisata') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    {{-- <i data-lucide="clipboard"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-image">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <circle cx="9" cy="9" r="2" />
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                    </svg>
                </div>
                <div class="side-menu__title"> Foto Wisata </div>
            </a>
        </li>
        <li>
            <a href="{{ url('kategori-wisata') }}"
                class="side-menu {{ Request::is('kategori-wisata') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                <div class="side-menu__title"> Data Kategori </div>
            </a>
        </li>
        <li>
            <a href="{{ url('komentar') }}"
                class="side-menu {{ Request::is('komentar') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                <div class="side-menu__title"> Komentar </div>
            </a>
        </li>
        <li>
            <a href="{{ url('') }}" class="side-menu {{ Request::is('/') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Home </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        {{-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                    Crud
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-crud-data-list.html" class="side-menu {{ Request::is('side-menu-light-crud-data-list.html') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Data List </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-crud-form.html" class="side-menu {{ Request::is('side-menu-light-crud-form.html') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Form </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Users
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-users-layout-1.html" class="side-menu {{ Request::is('side-menu-light-users-layout-1.html') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Layout 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-2.html" class="side-menu {{ Request::is('side-menu-light-users-layout-2.html') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Layout 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-3.html" class="side-menu {{ Request::is('side-menu-light-users-layout-3.html') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Layout 3 </div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</nav>
