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
    <title>Tambah Foto Wisata</title>
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
                        <li class="breadcrumb-item " aria-current="page">Foto Wisata</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Foto Wisata</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="intro-y flex items-center mt-8 mb-8">
                <h2 class="text-lg font-medium mr-auto">
                    Tambah Foto Wisata
                </h2>
                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="">
                <div class="intro-y col-span-11 2xl:col-span-9">
                    <form action="{{ route('simpan-foto-wisata') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="intro-y box p-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="mt-5">
                                    <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                        <div class="form-label w-full xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Pilih Wisata</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <select name="wisata_id" id="wisata_id" class="form-control">
                                                @foreach ($foto_wisata as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_wisata }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                        <div class="form-label w-full xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Foto Wisata</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="pl-4 pr-5">
                                                <div id="image-container"
                                                    class="col-span-5 md:col-span-2 h-64 relative image-fit cursor-pointer zoom-in">
                                                    <img id="uploaded-image" class="rounded-md hidden"
                                                        alt="Uploaded Image">
                                                    <div id="remove-image" title="Remove this image?"
                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                                        <i data-lucide="x" class="w-4 h-4"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                                <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                                    class="text-primary mr-1">Upload a file</span> or drag and drop
                                                <input id="foto" type="file" name="foto"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    accept=".jpeg, .jpg, .png" onchange="previewImage(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                const imageContainer = document.getElementById('image-container');
                                const uploadedImage = document.getElementById('uploaded-image');
                                const removeImage = document.getElementById('remove-image');

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        uploadedImage.src = e.target.result;
                                        uploadedImage.classList.remove('hidden');
                                        removeImage.classList.remove('hidden');
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            document.getElementById('remove-image').addEventListener('click', function() {
                                const uploadedImage = document.getElementById('uploaded-image');
                                const removeImage = document.getElementById('remove-image');
                                const inputFile = document.getElementById('foto');

                                uploadedImage.src = '';
                                uploadedImage.classList.add('hidden');
                                removeImage.classList.add('hidden');
                                inputFile.value = '';
                            });
                        </script>

                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
                        </div>
                    </form>
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
    <script src="dist/js/ckeditor-classic.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
