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
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Data User</title>
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
                        <li class="breadcrumb-item"></a>Application</li>
                        <li class="breadcrumb-item active" aria-current="page">Data User</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="">
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: Weekly Top Products -->
                        <div class="col-span-12 mt-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Data User
                                </h2>
                            </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center whitespace-nowrap">NAMA USER</th>
                                            <th class="text-center whitespace-nowrap">ALAMAT</th>
                                            <th class="text-center whitespace-nowrap">TELEPON</th>
                                            <th class="text-center whitespace-nowrap">TANGGAL LAHIR</th>
                                            <th class="text-center whitespace-nowrap">ROLE</th>
                                            <th class="text-center whitespace-nowrap">FOTO PROFIL</th>
                                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                            <tr class="intro-x">
                                                <td class="text-center">{{ $item->nama_lengkap }}</td>
                                                <td class="text-center">{{ $item->alamat }}</td>
                                                <td class="text-center">{{ $item->telepon }}</td>
                                                <td class="text-center">{{ $item->tanggal_lahir }}</td>
                                                <td class="text-center">{{ $item->user->role }}</td>
                                                <td class="flex justify-center">
                                                    @if ($item->foto_profil)
                                                        <img src="{{ asset('uploads/' . $item->foto_profil) }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                                                    @else
                                                        <img src="{{ asset('images/profil-blank.webp') }}" alt="Default Foto Profil" class="w-10 h-10 rounded-full">
                                                    @endif
                                                </td>
                                                <td class="table-report__action w-56">
                                                    <div class="flex justify-center items-center">
                                                        <a class="flex items-center mr-3"
                                                            href="{{ route('ubah-data-wisata', $item->id) }}">
                                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('hapus-komentar', $item->id) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="flex items-center text-danger">
                                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada komentar yang
                                                    ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <!-- END: Weekly Top Products -->
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
    <!-- END: JS Assets-->
</body>

</html>
