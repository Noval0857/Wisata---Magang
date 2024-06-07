<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>

<body>
    <x-leftsidebar></x-leftsidebar>
    <main>

        <!-- start about -->
        <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-12">
            <div class="container mx-auto flex flex-wrap justify-center">
                @foreach ($wisatas as $wisata)
                    <!-- Wisata Item -->
                    <div class="w-full md:w-1/3 p-4 animate-fadeIn">
                        <div class="bg-white rounded-lg border border-gray-300 overflow-hidden shadow-md p-2">
                            <img src="{{ asset('images/image.png') }}" class="w-full h-auto">
                            <div class="p-6">
                                <h4 class="text-xl font-bold mb-2">{{ $wisata->nama_wisata }}</h4>
                                <p class="text-gray-700 mb-4">{{ $wisata->deskripsi }}</p>
                                <a href="{{ route('ubah-data-wisata', $wisata->id) }}"
                                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                                <a href="#" class="inline-block bg-red-500 text-white px-4 py-2 rounded"
                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $wisata->id_wisata }}').submit(); }">Hapus</a>
                                <form id="delete-form-{{ $wisata->id }}"
                                    action="{{ route('hapus-data-wisata', $wisata->id) }}"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
        <!-- end about -->
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    
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
</body>

</html>
