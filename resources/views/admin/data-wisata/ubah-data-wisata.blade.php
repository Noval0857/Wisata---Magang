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
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Ubah Data Wisata</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
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
                        <li class="breadcrumb-item " aria-current="page">Data Wisata</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Wisata</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="intro-y flex items-center mt-8 mb-8">
                <h2 class="text-lg font-medium mr-auto">
                    Edit Data Wisata
                </h2>
            </div>
            <div class="">
                <div class="intro-y col-span-11 2xl:col-span-9">
                    <form action="{{ url('simpan-data-wisata/' . $wisatas->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- BEGIN: Upload Product -->
                        <div class="intro-y box p-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="mt-5">
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
                                                <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                                                <span class="text-primary mr-1">Upload a file</span> or drag and drop
                                                <input id="foto" type="file" name="foto"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0"
                                                    accept=".jpeg, .jpg, .png" onchange="previewImage(event)">
                                            </div>

                                            <!-- Display the current image if exists -->
                                            @if ($wisatas->path)
                                                <div class="mt-4">
                                                    <img id="currentImage" src="{{ asset($foto->path) }}"
                                                        alt="Current Image" style="max-width: 200px;">
                                                </div>
                                            @endif

                                            <script>
                                                function previewImage(event) {
                                                    var reader = new FileReader();
                                                    reader.onload = function() {
                                                        var output = document.getElementById('currentImage');
                                                        output.src = reader.result;
                                                    };
                                                    reader.readAsDataURL(event.target.files[0]);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Nama Wisata</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="nama_wisata" name="nama_wisata" type="text"
                                                class="form-control" placeholder="Nama wisata"
                                                value="{{ $wisatas->nama_wisata }}">
                                        </div>
                                    </div>
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Category</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <select id="category_id" name="category_id" class="form-select">
                                                <option value="" selected disabled>Pilih kategori...</option>
                                                @foreach ($kategoris as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $wisatas->category_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Deskripsi Wisata</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <textarea id="deskripsi" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi Wisata">{{ $wisatas->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Alamat</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="alamat" name="alamat" type="text" class="form-control"
                                                placeholder="Alamat Wisata" value="{{ $wisatas->alamat }}">
                                        </div>
                                    </div>
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Google Maps URL</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="google_maps_url" name="google_maps_url" type="text"
                                                class="form-control" placeholder="Google Maps URL"
                                                value="{{ $wisatas->google_maps_url }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" class="btn btn-primary w-full md:w-52">Save</button>
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
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
    <script src="{{ asset('dist/js/ckeditor-classic.js') }}"></script>

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

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi CKEditor
        CKEDITOR.replace('deskripsi');

        // Optional: Tambahkan log untuk debugging
        document.getElementById('wisataForm').addEventListener('submit', function(event) {
            var content = CKEDITOR.instances['deskripsi'].getData();
            console.log('Editor content:', content); // Debugging log
        });
    });
</script> --}}

<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });
</script>

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
</body>

</html>
