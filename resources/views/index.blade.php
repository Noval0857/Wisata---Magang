<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Kota Banjarmasin</title>
    @vite('resources/css/app.css')
    <script src="../path/to/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <main class="w-full">
        <x-header></x-header>
        <x-component1></x-component1>
        <!-- start about -->
        <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-wrap mx-auto px-4">
                <div class="w-full">
                    <h2 class="text-5xl leading-tight font-bold mt-4">Kota Banjarmasin</h2>
                    {{-- <p class="text-lg mt-4 font-semibold">Excellence in Dentistry in the Heart of NY</p> --}}
                    <p class="text-2xl mt-2 leading-relaxed">Kota Banjarmasin, yang dikenal sebagai "Kota Seribu Sungai,"
                        merupakan
                        ibu kota provinsi Kalimantan Selatan. Terletak di delta sungai Barito dan Martapura, kota ini
                        memiliki keunikan tersendiri dengan keberadaan sungai-sungai yang mengalir di seluruh penjuru
                        kota,
                        menciptakan pemandangan yang memikat dan memberikan pengalaman wisata yang berbeda dari
                        kota-kota
                        lain di Indonesia. Banjarmasin tidak hanya menawarkan keindahan alam, tetapi juga kekayaan
                        budaya,
                        sejarah, dan kuliner yang menarik untuk dijelajahi.</p>
                </div>
            </div>
            <div class="container mx-auto flex flex-wrap justify-center">
                @foreach ($wisatas as $wisata)
                    <!-- Wisata Item -->
                    <div class="w-full md:w-1/3 p-4 animate-fadeIn">
                        <div class="bg-white rounded-lg border border-gray-300 overflow-hidden shadow-md p-2">
                            <img src="{{ asset('images/image.png') }}" class="w-full h-auto">
                            <div class="p-6">
                                <h4 class="text-xl font-bold mb-2">{{ $wisata->nama_wisata }}</h4>
                                <p class="text-gray-700 mb-4">{{ $wisata->deskripsi }}</p>
                                <a href="#"
                                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Explore</a>
                            </div>
                        </div>
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
                            confirmButtonText: 'OK'
                        });
                    @elseif (session('warning'))
                        Swal.fire({
                            title: 'Error!',
                            text: '{{ session('warning') }}',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    @endif
                });
            </script>
        </section>
    </main>
</body>
@include('komponen.footer')

</html>
