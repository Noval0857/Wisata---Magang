<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Wisata</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>

<body>
    <x-leftsidebar></x-leftsidebar>
    <div class="relative px-16 py-16 sm:px-8 lg:px-72 lg:py-16">
        <div class="bg-white border-b border-gray-200 px-6 py-3">
            <h6 class="font-bold text-blue-600">Data Wisata</h6>
        </div>
        <div class="bg-white p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Nama Wisata</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Deskripsi</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Alamat</th>
                            <th class="border-b border-gray-200 px-4 py-2 text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wisatas as $item)
                            <tr>
                                {{-- <td class="border-b border-gray-200 px-4 py-2">
                                    <img class="h-24 w-18 object-cover"
                                        src="{{ asset('img/' . $item->gambar) }}">
                                </td> --}}
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->nama_wisata }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->deskripsi }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">{{ $item->alamat }}</td>
                                <td class="border-b border-gray-200 px-4 py-2">
                                    <a href="{{ url('ubah-pengguna', $item->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>
                                    |
                                    <a href="{{ url('delete-data/' . $item->id) }}"
                                        class="text-red-500 hover:text-red-700">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
