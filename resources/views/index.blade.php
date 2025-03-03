<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Kota Banjarmasin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logodispar.png') }}">
    <script src="../path/to/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <style>
        .fixed-dimensions {
            width: 700px;
            height: 300px;
            object-fit: cover; /* Ensures the image covers the area while maintaining aspect ratio */
        }
    </style>
</head>

<body>

    <main class="">
        {{-- <x-header></x-header> --}}
        <x-nav-bar></x-nav-bar>

        <x-component1></x-component1>
        <!-- start about -->
        <section class="py-6 px-4 lg:px-36 xl:px-40">
            <div class="flex flex-wrap lg:px-4 lg:py-4 sm:px-2">
                <div class="w-full">
                    <h2 class="leading-tight font-bold sm:text-2xl md:text-4xl lg:text-4xl">Kota
                        Banjarmasin</h2>
                        <h2>tes</h2>
                    <p class="mt-2 sm:text-sm md:text-2xl lg:text-2xl leading-relaxed text-justify">Kota
                        Banjarmasin, yang dikenal sebagai "Kota Seribu Sungai,"
                        merupakan ibu kota provinsi Kalimantan Selatan. Terletak di delta sungai Barito dan Martapura,
                        kota ini
                        memiliki keunikan tersendiri dengan keberadaan sungai-sungai yang mengalir di seluruh penjuru
                        kota,
                        menciptakan pemandangan yang memikat dan memberikan pengalaman wisata yang berbeda dari
                        kota-kota
                        lain di Indonesia. Banjarmasin tidak hanya menawarkan keindahan alam, tetapi juga kekayaan
                        budaya, sejarah, dan kuliner yang menarik untuk dijelajahi.</p>
                </div>
            </div>
            <div class="container grid grid-cols-1 md:grid-cols-3 gap-4 justify-center lg:px-4 sm:px-2 mt-4">
                @foreach ($wisatas as $wisata)
                    <!-- Wisata Item -->
                    <div class="animate-fadeIn">
                        <a href="{{ route('detail-wisata', str_replace(' ', '-', $wisata->nama_wisata)) }}"
                            class="block">
                            <div class="rounded-lg overflow-hidden shadow-md relative">
                                @php
                                    $firstFoto = $wisata->fotoWisata->first();
                                @endphp
                                @if ($firstFoto)
                                    <img src="{{ asset($firstFoto->path) }}" alt="{{ $wisata->nama_wisata }}"
                                        class="w-full h-full object-cover fixed-dimensions">
                                @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image"
                                        class="w-full h-full object-cover">
                                @endif
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 hover:bg-black hover:bg-opacity-80 transition duration-300">
                                    <span
                                        class="px-2 py-1 rounded text-center uppercase text-white font-bold">{{ $wisata->nama_wisata }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>




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
        </section>


    </main>
</body>
<x-footer></x-footer>

</html>
