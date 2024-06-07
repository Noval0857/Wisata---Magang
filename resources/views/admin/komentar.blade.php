<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kmentar</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>

<body>
    <x-leftsidebar></x-leftsidebar>
    <div class="relative px-16 py-16 sm:px-8 lg:px-72 lg:py-16">
        <div class="bg-white border-b border-gray-200 px-6 py-3">
            <h6 class="font-bold text-blue-600">Komentar</h6>
        </div>
        <div class="bg-white p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">User</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Nama Wisata</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Konten</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wisatas as $item)
                            <tr>
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->nama_wisata }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->deskripsi }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->alamat }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">
                                    <a href="{{ route('ubah-data-wisata', $item->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>
                                    |
                                    <form action="{{ route('hapus-data-wisata', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>

</html>
