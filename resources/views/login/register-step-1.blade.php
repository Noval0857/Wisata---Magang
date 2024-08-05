<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Step 1</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-primary h-screen flex items-center justify-center">
    <section class="cover bg-blue-teal-gradient relative bg-yellow-800 overflow-hidden w-full flex items-center justify-center min-h-screen">
        <div class="h-full absolute top-0 left-0 z-0">
            <img src="{{ asset('images/Banner_Bjm.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative z-10 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{ url('register-step-1') }}" method="POST">
                {{ csrf_field() }}
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Masukkan Data Diri</h5>
                <div>
                    <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required />
                </div>
                <div>
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div>
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Handphone</label>
                    <input type="number" name="telepon" id="telepon" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">saya menyetujui <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">syarat dan ketentuan</a></label>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjutkan</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Sudah Memiliki Akun? <a href="{{ url('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Masuk</a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
