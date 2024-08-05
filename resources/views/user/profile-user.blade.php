<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile User</title>
    <script src="../path/to/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</head>

<body class="bg-white">
    <x-nav-bar></x-nav-bar>
    <div class="flex items-center justify-center min-h-screen pb-80">
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <img class="w-40 h-40 mb-3 mt-10 rounded-full shadow-lg"
                    src='{{ $user->foto_profil ? asset('uploads/' . $user->foto_profil) : asset('images/profil-blank.webp') }}'
                    alt='Profile Picture' />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->nama_lengkap }}</h5>
                <div class="flex mt-4 md:mt-6">
                    <button type="submit"
                        class="w-full rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2"
                        onclick="window.location.href='{{ route('edit-user') }}'">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
