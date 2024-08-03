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
    <title>Foto Wisata</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Foto Wisata</li>
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
                                    Data Wisata
                                </h2>
                                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <a href="{{ route('tambah-foto-wisata') }}"
                                        class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300">
                                        <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Tambah
                                        Data </a>
                                </div>
                            </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">IMAGES</th>
                                            <th class="whitespace-nowrap">NAMA WISATA</th>
                                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($foto_wisata as $item)
                                            @foreach ($item->fotoWisata as $index => $foto)
                                                <tr class="intro-x">
                                                    @if ($index !== 0)
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset($foto->path) }}" alt="{{ $item->nama_wisata }}"
                                                                        class="w-52">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="" class="font-medium whitespace-nowrap">{{ $item->nama_wisata }}</a>
                                                            </td>
                                                            <td class="table-report__action w-56">
                                                                <div class="flex justify-center items-center">
                                                                    <a class="flex items-center mr-3"
                                                                        href="{{ route('ubah-data-wisata', $item->id) }}"> <i
                                                                            data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                                                        Edit </a>
                                                                    <form action="{{ route('hapus-data-wisata', $item->id) }}"
                                                                        method="POST" class="inline-block delete-form"
                                                                        data-id="{{ $item->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button"
                                                                            class="flex items-center text-danger delete-button"
                                                                            data-id="{{ $item->id }}">
                                                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endforeach
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
