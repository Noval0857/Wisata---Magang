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
        {{-- @include('komponen.header')

        @include('komponen.content1')
        @include('komponen.content2') --}}
        <x-header></x-header>
        <x-component1></x-component1>
        <x-component2></x-component2>

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
    </main>
</body>
@include('komponen.footer')

</html>
