<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
    <!-- BEGIN: Mobile Menu -->
    <x-nav-bar-admin-mobile></x-nav-bar-admin-mobile>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <x-nav-bar-admin></x-nav-bar-admin>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="">
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6 mt-6">
                        <a href="{{ url('data-user') }}" class="intro-y col-span-12 lg:col-span-4 box py-10">
                            <i data-lucide="users" class="block w-12 h-12 text-primary mx-auto"></i>
                            <div class="font-medium text-center text-base mt-3">Data User</div>
                            <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">
                                <h3 class="text-2xl font-bold text-primary counter"
                                    data-target-value="{{ $userCount }}">0</h3>
                            </div>
                        </a>
                        <a href="{{ url('data-wisata') }}" class="intro-y col-span-12 lg:col-span-4 box py-10">
                            {{-- <i data-lucide="navigation" class="block w-12 h-12 text-primary mx-auto"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-map-pinned block w-12 h-12 text-primary mx-auto">
                                <path d="M18 8c0 4.5-6 9-6 9s-6-4.5-6-9a6 6 0 0 1 12 0" />
                                <circle cx="12" cy="8" r="2" />
                                <path
                                    d="M8.835 14H5a1 1 0 0 0-.9.7l-2 6c-.1.1-.1.2-.1.3 0 .6.4 1 1 1h18c.6 0 1-.4 1-1 0-.1 0-.2-.1-.3l-2-6a1 1 0 0 0-.9-.7h-3.835" />
                            </svg>
                            <div class="font-medium text-center text-base mt-3">Data Wisata</div>
                            <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">
                                <h3 class="text-2xl font-bold text-primary counter"
                                    data-target-value="{{ $wisataCount }}">0</h3>
                            </div>
                        </a>
                        <a href="{{ url('kategori-wisata') }}" class="intro-y col-span-12 lg:col-span-4 box py-10">
                            <i data-lucide="book" class="block w-12 h-12 text-primary mx-auto"></i>
                            <div class="font-medium text-center text-base mt-3">Data Kategori</div>
                            <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">
                                <h3 class="text-2xl font-bold text-primary counter"
                                    data-target-value="{{ $categoryCount }}">0</h3>
                            </div>
                        </a>
                        <a href="{{ url('komentar') }}" class="intro-y col-span-12 lg:col-span-4 box py-10">
                            <i data-lucide="message-square" class="block w-12 h-12 text-primary mx-auto"></i>
                            <div class="font-medium text-center text-base mt-3">Data Komentar</div>
                            <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">
                                <h3 class="text-2xl font-bold text-primary counter"
                                    data-target-value="{{ $commentCount }}">0</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="dist/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- END: JS Assets-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll(".counter");

            counters.forEach((counter) => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target-value");
                    const count = +counter.innerText;
                    const increment = target / 200;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 300);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000, // Waktu dalam milidetik (3000ms = 3 detik)
                    showConfirmButton: false
                });
            @elseif (session('warning'))
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('warning') }}',
                    icon: 'error',
                    timer: 3000, // Waktu dalam milidetik (3000ms = 3 detik)
                    showConfirmButton: false
                });
            @endif
        });
    </script>
</body>

</html>
