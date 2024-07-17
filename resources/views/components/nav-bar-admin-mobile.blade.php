<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto text-white"> WisBJM
        </a>
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler">
            <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <ul class="scrollable__content py-2">
            <li>
                <a href="{{ url('admin') }}" class="menu {{ Request::is('admin') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="{{ url('data-user') }}" class="menu {{ Request::is('data-user') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title"> Data User </div>
                </a>
            </li>
            <li>
                <a href="{{ url('data-wisata') }}" class="menu {{ Request::is('data-user') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        {{-- <i data-lucide="message-square"></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-map-pinned">
                            <path d="M18 8c0 4.5-6 9-6 9s-6-4.5-6-9a6 6 0 0 1 12 0" />
                            <circle cx="12" cy="8" r="2" />
                            <path
                                d="M8.835 14H5a1 1 0 0 0-.9.7l-2 6c-.1.1-.1.2-.1.3 0 .6.4 1 1 1h18c.6 0 1-.4 1-1 0-.1 0-.2-.1-.3l-2-6a1 1 0 0 0-.9-.7h-3.835" />
                        </svg>
                    </div>
                    <div class="menu__title"> Data Wisata </div>
                </a>
            </li>
            <li>
                <a href="{{ url('foto-wisata') }}" class="menu {{ Request::is('foto-wisata') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        {{-- <i data-lucide="message-square"></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-image">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        </svg>
                    </div>
                    <div class="menu__title"> Foto Wisata </div>
                </a>
            </li>
            <li>
                <a href="{{ url('kategori-wisata') }}"
                    class="menu {{ Request::is('kategori-wisata') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="book"></i> </div>
                    <div class="menu__title"> Data Kategori </div>
                </a>
            </li>
            <li>
                <a href="{{ url('komentar') }}" class="menu {{ Request::is('komentar') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                    <div class="menu__title"> Komentar </div>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="menu {{ Request::is('/') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Home </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Crud <i data-lucide="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ url('menu-light-crud-data-list') }}"
                            class="menu {{ Request::is('menu-light-crud-data-list') ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Data List </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('menu-light-crud-form') }}"
                            class="menu {{ Request::is('menu-light-crud-form') ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Form </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ url('menu-light-users-layout-1') }}"
                            class="menu {{ Request::is('menu-light-users-layout-1') ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 1 </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('menu-light-users-layout-2') }}"
                            class="menu {{ Request::is('menu-light-users-layout-2') ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 2 </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('menu-light-users-layout-3') }}"
                            class="menu {{ Request::is('menu-light-users-layout-3') ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 3 </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
