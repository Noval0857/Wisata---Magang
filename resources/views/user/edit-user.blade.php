<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="../path/to/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <title>Edit Profile</title>
</head>

<body class="bg-white">
    <x-nav-bar></x-nav-bar>
    <div class="flex items-center justify-center min-h-screen">
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="mx-auto w-32 h-32 relative border-4 mt-2 border-white rounded-full overflow-hidden">
                <img class="object-cover object-center h-32 w-full"
                    src='{{ $profile->foto_profil ? asset('uploads/' . $profile->foto_profil) : asset('images/profil-blank.webp') }}'
                    alt='Profile Picture'>
            </div>
            <div class="text-center mt-2">
                <h2 class="font-semibold">{{ $user->name }}</h2>
            </div>
            <div class="p-4 border-t mx-8 mt-2">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4 text-center">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('update-user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                            value="{{ old('nama_lengkap', $profile->nama_lengkap) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('alamat', $profile->alamat) }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="text" name="telepon" id="telepon"
                            value="{{ old('telepon', $profile->telepon) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="foto_profil" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <input type="file" name="foto_profil" id="foto_profil"
                            class="mt-1 block w-full text-gray-900 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
