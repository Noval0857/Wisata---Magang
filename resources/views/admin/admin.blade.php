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

                <!-- Pasar Terapung -->
                <div class="w-full md:w-1/3 p-4 animate-fadeIn">
                    <div class="bg-white rounded-lg border border-gray-300 overflow-hidden shadow-md p-2">
                        <img src="{{ asset('images/image.png') }}" alt="Kiram Park" class="w-full h-auto">
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2">Kiram Park</h4>
                            <p class="text-gray-700 mb-4">Kiram Park merupakan salah satu objek wisata yang populer di
                                kawasan Kabupaten Banjar, provinsi Kalimantan Selatan</p>
                            <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                            <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- end about -->
    </main>



</body>

</html>
